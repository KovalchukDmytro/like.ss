<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_categories".
 *
 * @property integer $id
 * @property integer $sort
 * @property integer $creation_time
 * @property integer $update_time
 * @property integer $cat_id
 *
 * @property NewsCategoriesInfo[] $newsCategoriesInfos
 */
class NewsCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort', 'creation_time', 'update_time', 'cat_id'], 'required'],
            [['sort', 'creation_time', 'update_time', 'cat_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort' => 'Sort',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
            'cat_id' => 'Cat ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasOne(NewsCategoriesInfo::className(), ['record_id' => 'id'])->where([NewsInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }
    public function getNewsCategoriesInfos()
    {
        return $this->hasMany(NewsCategoriesInfo::className(), ['record_id' => 'id']);
    }

    public static function find()
    {
        return new \app\models\Queries\NewsCategoriesQuery(get_called_class());
    }

}
