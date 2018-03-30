<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portfolio_item_info".
 *
 * @property integer $record_id
 * @property string $lang
 * @property string $title
 * @property string $description
 * @property string $text
 *
 * @property PortfolioItem $record
 */
class PortfolioItemInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_item_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['record_id', 'lang', 'title', 'description', 'text'], 'required'],
            [['record_id'], 'integer'],
            [['text'], 'string'],
            [['lang'], 'string', 'max' => 3],
            [['title', 'description'], 'string', 'max' => 250],
            [['record_id'], 'exist', 'skipOnError' => true, 'targetClass' => PortfolioItem::className(), 'targetAttribute' => ['record_id' => 'id']],
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
            'description' => 'Краткий текст',
            'text' => 'Текст',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecord()
    {
        return $this->hasOne(PortfolioItem::className(), ['id' => 'record_id']);
    }

    /**
     * @inheritdoc
     * @return PortfolioItemInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PortfolioItemInfoQuery(get_called_class());
    }
}
