<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "service_category".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $sort
 * @property integer $parent_category_id
 *
 * @property ServiceCategoryInfo[] $serviceCategoryInfos
 */
class ServiceCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'sort', 'parent_category_id'], 'required'],
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
		return $this->hasOne(ServiceCategoryInfo::className(), ['record_id' => 'id'])->where([ServiceCategoryInfo::tableName().'.lang' => Lang::getCurrentId()]);
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias (генерируеться, если не заполнен)',
            'sort' => 'SORT',
            'parent_category_id' => 'Принадлежит категории',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceCategoryInfos()
    {
        return $this->hasMany(ServiceCategoryInfo::className(), ['record_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ServiceCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceCategoryQuery(get_called_class());
    }
}
