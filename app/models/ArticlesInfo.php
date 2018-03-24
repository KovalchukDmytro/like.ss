<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles_info".
 *
 * @property integer $record_id
 * @property integer $lang
 * @property string $title
 * @property string $description
 * @property string $text
 *
 * @property Articles $record
 */
class ArticlesInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'text'], 'required'],
            [['record_id', 'lang'], 'integer'],
            [['title', 'description', 'text'], 'string'],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articles::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'text' => 'Text',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(Articles::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\Queries\ArticlesInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Queries\ArticlesInfoQuery(get_called_class());
    }
}
