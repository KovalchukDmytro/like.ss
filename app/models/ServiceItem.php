<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "service_item".
 *
 * @property integer $id
 * @property string $alias
 * @property string $date
 * @property integer $sort
 * @property integer $parent_category_id
 *
 * @property ServiceItemInfo[] $serviceItemInfos
 */
class ServiceItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'date', 'sort', 'parent_category_id'], 'required'],
            [['date'], 'safe'],
            [['sort', 'parent_category_id'], 'integer'],
            [['alias'], 'string', 'max' => 250],
        ];
    }
	public function behaviors() { //add
		return [
			'thumb' => [
				'class' => ImgBehavior::className(),
			],
		];
	}
	public function getInfo() //add
	{
		return $this->hasOne(ServiceItemInfo::className(), ['record_id' => 'id'])->where([ServiceItemInfo::tableName().'.lang' => Lang::getCurrentId()]);
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias (генерируеться, если не заполнен)',
            'date' => 'Дата',
            'sort' => 'SORT',
            'parent_category_id' => 'Принадлежит категории',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceItemInfos()
    {
        return $this->hasMany(ServiceItemInfo::className(), ['record_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ServiceItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceItemQuery(get_called_class());
    }
}
