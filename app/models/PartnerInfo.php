<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner_info".
 *
 * @property integer $record_id
 * @property string $lang
 * @property string $title
 *
 * @property Partner $record
 */
class PartnerInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title'], 'required'],
            [['record_id'], 'integer'],
            [['lang'], 'string', 'max' => 3],
            [['title'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partner::className(), 'targetAttribute' => ['record_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'record_id' => 'Record ID',
            'lang' => 'Lang',
            'title' => 'Идентификатор партнера',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Partner::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return PartnerInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerInfoQuery(get_called_class());
    }
}
