<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $status
 * @property integer $sort
 * @property string $custom_date
 * @property integer $creation_time
 * @property integer $update_time
 *
 * @property NewsInfo[] $newsInfos
 */
class News extends \yii\db\ActiveRecord
{
    
    const IMG_COUNT = 20;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'creation_time'], 'required'],
            [['alias', 'custom_date'], 'string'],
            [['status', 'sort','creation_time', 'update_time'], 'integer'],
        ];
    }

    public function behaviors() {
        return [
            'thumb' => [
                'class' => ImgBehavior::className(),
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
            'custom_date' => Yii::t('app', 'Custom Date'),
            'creation_time' => Yii::t('app', 'Creation Time'),
            'update_time' => Yii::t('app', 'Update Time'),
        ];
    }

    public function img_count_const(){
        return self::IMG_COUNT;
    }

	public function getNewsInfos()
	{
		return $this->hasMany(NewsInfo::className(), ['record_id' => 'id']);
	}
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfos()
    {
        return $this->hasMany(NewsInfo::className(), ['record_id' => 'id'])->where([NewsInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne(NewsInfo::className(), ['record_id' => 'id'])->where([NewsInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }

    /**
     * @inheritdoc
     * @return \app\models\Queries\NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Queries\NewsQuery(get_called_class());
    }
    
    public function getUrl(){
        return Url::to(['news/'.$this->alias], true);
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
