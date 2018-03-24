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
 * @property CatalogsInfo[] $articlesInfos
 */
class Catalogs extends \yii\db\ActiveRecord
{
    
    const IMG_COUNT = 20;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalogs';
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
    public function getCatalogsInfos()
    {
        return $this->hasMany(CatalogsInfo::className(), ['record_id' => 'id'])->where([CatalogsInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }
     public function getSss()
    {
        return $this->hasMany(CatalogsInfo::className(), ['record_id' => 'id']);
    }
    public function getInfo()
    {
        return $this->hasOne(CatalogsInfo::className(), ['record_id' => 'id'])->where([CatalogsInfo::tableName().'.lang' => Lang::getCurrentId()])->andWhere(['!=',CatalogsInfo::tableName().'.title',''])->andWhere(['!=',CatalogsInfo::tableName().'.text','']);
    }


    /**
     * @inheritdoc
     * @return \app\models\Queries\CatalogsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Queries\CatalogsQuery(get_called_class());
    }
    
    public function getUrl(){

			return Url::to(['/catalogs/'.$this->alias.'/'], true);

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