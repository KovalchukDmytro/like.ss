<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seo_new".
 *
 * @property integer $id
 * @property string $url
 * @property string $type
 *
 * @property SeoNewInfo[] $seoNewInfos
 */
class SeoNew extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seo_new';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'type'], 'required'],
            [['url', 'type'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeoNewInfos()
    {
        return $this->hasMany(SeoNewInfo::className(), ['record_id' => 'id']);
    }
	public function getInfo()
	{
		return $this->hasOne(SeoNewInfo::className(), ['record_id'=>'id'])->onCondition([SeoNewInfo::tableName().'.lang' => Lang::getCurrentId()]);
	}
}
