<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property integer $active
 * @property string $alias
 * @property string $url
 * @property integer $sort
 *
 * @property BannerInfo[] $bannerInfos
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'alias', 'url', 'sort'], 'required'],
            [['active', 'sort'], 'integer'],
            [['alias', 'url'], 'string', 'max' => 250],
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
		return $this->hasOne(BannerInfo::className(), ['record_id' => 'id'])->where([BannerInfo::tableName().'.lang' => Lang::getCurrentId()]);
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Опубликовать',
            'alias' => 'Alias (генерируеться, если не заполнен)',
            'url' => 'Адрес для прехода при нажатии на кнопку',
            'sort' => 'SORT',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBannerInfos()
    {
        return $this->hasMany(BannerInfo::className(), ['record_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return BannerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BannerQuery(get_called_class());
    }
}
