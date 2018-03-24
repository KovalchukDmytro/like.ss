<?php

namespace app\models;

//add
use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "partner".
 *
 * @property integer $id
 * @property integer $active
 * @property string $alias
 * @property integer $sort
 *
 * @property PartnerInfo[] $partnerInfos
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'alias', 'sort'], 'required'],
            [['active', 'sort'], 'integer'],
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Опубликовать',
            'alias' => 'Alias (генерируеться, если не заполнен)',
            'sort' => 'SORT',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPartnerInfos()
    {
        return $this->hasMany(PartnerInfo::className(), ['record_id' => 'id']);
    }
    public function getInfo() //add
    {
        return $this->hasOne(PartnerInfo::className(), ['record_id' => 'id'])->where([PartnerInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }
    /**
     * @inheritdoc
     * @return PartnerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerQuery(get_called_class());
    }
}
