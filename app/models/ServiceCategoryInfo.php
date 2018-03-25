<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_category_info".
 *
 * @property integer $record_id
 * @property string $lang
 * @property string $title
 * @property string $text
 *
 * @property ServiceCategory $record
 */
class ServiceCategoryInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_category_info';
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
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceCategory::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'title' => 'Название',
            'text' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(ServiceCategory::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return ServiceCategoryInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceCategoryInfoQuery(get_called_class());
    }
}
