<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;

/**
 * This is the model class for table "portfolio_item".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $sort
 *
 * @property PortfolioItemInfo[] $portfolioItemInfos
 */
class PortfolioItem extends \yii\db\ActiveRecord
{
	const IMG_COUNT = 25;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'sort'], 'required'],
            [['sort'], 'integer'],
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
		return $this->hasOne(PortfolioItemInfo::className(), ['record_id' => 'id'])->where([PortfolioItemInfo::tableName().'.lang' => Lang::getCurrentId()]);
	}
	public function img_count_const(){ //add
		return self::IMG_COUNT;
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioItemInfos()
    {
        return $this->hasMany(PortfolioItemInfo::className(), ['record_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PortfolioItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PortfolioItemQuery(get_called_class());
    }
}
