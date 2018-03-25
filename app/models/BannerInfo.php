<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner_info".
 *
 * @property integer $record_id
 * @property string $lang
 * @property string $title
 * @property string $text
 *
 * @property Banner $record
 */
class BannerInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'text'], 'required'],
            [['record_id'], 'integer'],
            [['text'], 'string'],
            [['lang'], 'string', 'max' => 3],
            [['title'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Banner::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'title' => 'Заголовок',
            'text' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Banner::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return BannerInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BannerInfoQuery(get_called_class());
    }
}
