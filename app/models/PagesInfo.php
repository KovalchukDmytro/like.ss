<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 * @property string $text
 *
 * @property Pages $record
 */
class PagesInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'title' => 'Title',
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Pages::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return PagesInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagesInfoQuery(get_called_class());
    }
}
