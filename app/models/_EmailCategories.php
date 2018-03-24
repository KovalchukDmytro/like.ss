<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email_categories".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $sort
 * @property integer $creation_time
 * @property integer $update_time
 * @property string $title
 */
class EmailCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'sort', 'creation_time', 'update_time', 'title'], 'required'],
            [['cat_id', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'sort' => 'Sort',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
            'title' => 'Title',
        ];
    }

    /**
     * @inheritdoc
     * @return EmailCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmailCategoriesQuery(get_called_class());
    }
}
