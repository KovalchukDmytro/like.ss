<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property integer $id
 * @property integer $cat_id
 * @property integer $sort
 * @property integer $creation_time
 * @property integer $update_time
 * @property string $email
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id',  'email'], 'required'],
            [['cat_id', 'sort', 'creation_time', 'update_time'], 'integer'],
            [['email'], 'string', 'max' => 255],
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
            'email' => 'Email',
        ];
    }

    /**
     * @inheritdoc
     * @return EmailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmailQuery(get_called_class());
    }
}
