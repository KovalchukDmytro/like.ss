<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_categories_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 *
 * @property NewsCategories $record
 */
class NewsCategoriesInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_categories_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['title'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategories::className(), 'targetAttribute' => ['record_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(NewsCategories::className(), ['id' => 'record_id']);
    }
    public static function find()
    {
        return new \app\models\Queries\NewsCategoriesInfoQuery(get_called_class());
    }
}
