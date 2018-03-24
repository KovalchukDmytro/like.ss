<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles_categories_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 * @property string $description
 *
 * @property ArticlesCategories $record
 */
class ArticlesCategoriesInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_categories_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'description'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['title', 'description'], 'string'],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticlesCategories::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(ArticlesCategories::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\Queries\ArticlesCategoriesInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Queries\ArticlesCategoriesInfoQuery(get_called_class());
    }
}
