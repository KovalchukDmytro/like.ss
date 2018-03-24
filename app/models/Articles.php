<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $parent_id
 * @property integer $status
 * @property integer $sort
 * @property string $custom_date
 * @property integer $creation_time
 * @property integer $update_time
 *
 * @property ArticlesInfo[] $articlesInfos
 */
class Articles extends \yii\db\ActiveRecord
{
    
    const IMG_COUNT = 20;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias',  'sort', 'custom_date', 'creation_time'], 'required'],
            [['alias', 'custom_date'], 'string'],
            [[ 'status', 'sort', 'creation_time', 'update_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'status' => 'Status',
            'sort' => 'Sort',
            'custom_date' => 'Custom Date',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
        ];
    }

    public function behaviors() {
        return [
            'thumb' => [
                'class' => ImgBehavior::className(),
            ],
        ];
    }
    
    public function img_count_const(){
        return self::IMG_COUNT;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesInfos()
    {
        return $this->hasMany(ArticlesInfo::className(), ['record_id' => 'id'])->where([ArticlesInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }
     public function getSss()
    {
        return $this->hasMany(ArticlesInfo::className(), ['record_id' => 'id']);
    }
    public function getInfo()
    {
        return $this->hasOne(ArticlesInfo::className(), ['record_id' => 'id'])->where([ArticlesInfo::tableName().'.lang' => Lang::getCurrentId()])->andWhere(['!=',ArticlesInfo::tableName().'.title',''])->andWhere(['!=',ArticlesInfo::tableName().'.text','']);
    }


    /**
     * @inheritdoc
     * @return \app\models\Queries\ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Queries\ArticlesQuery(get_called_class());
    }
    
    public function getUrl(){

			return Url::to(['/webinar/'.$this->alias.'/'], true);

    }
    
    public function getDate($format = 'd.m.Y') 
    {
        if(is_null($this->custom_date) || empty($this->custom_date)) {
            return gmdate($format, $this->creation_time);
        } else {
            $timestamp = strtotime($this->custom_date);
            return gmdate($format, $timestamp);
        }
    }
}