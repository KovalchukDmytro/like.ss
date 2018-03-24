<?php

namespace app\models;

use Yii;
use app\components\behavior\ImgBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "articles_categories".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $status
 * @property integer $parent_id
 * @property integer $sort
 * @property string $custom_date
 * @property integer $creation_time
 * @property integer $update_time
 *
 * @property ArticlesCategoriesInfo[] $articlesCategoriesInfos
 */
class ArticlesCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'sort', 'custom_date', 'creation_time'], 'required'],
            [['alias', 'custom_date'], 'string'],
            [['status', 'parent_id', 'sort', 'creation_time', 'update_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'status' => 'Status',
            'parent_id' => 'Parent ID',
            'sort' => 'Sort',
            'custom_date' => 'Custom Date',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
        ];
    }
    
    
    public function behaviors() {
        return [
            'thumb' => [
                'class' => ImgBehavior::className(),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticlesCategoriesInfos()
    {
        return $this->hasMany(ArticlesCategoriesInfo::className(), ['record_id' => 'id'])->where([ArticlesCategoriesInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfo()
    {
        return $this->hasone(ArticlesCategoriesInfo::className(), ['record_id' => 'id'])->where([ArticlesCategoriesInfo::tableName().'.lang' => Lang::getCurrentId()])->andWhere(['!=',ArticlesCategoriesInfo::tableName().'.title','']);
    }
	public function getSss()
    {
        return $this->hasMany(ArticlesCategoriesInfo::className(), ['record_id' => 'id']);
    }
    /**
     * @inheritdoc
     * @return \app\models\Queries\ArticlesCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\Queries\ArticlesCategoriesQuery(get_called_class());
    }
    
    public function getUrl(){
		if ($this->id==33 or $this->id==34)
		{
        return Url::to(["portfolio_category/".$this->alias.'/'], true);
		}
		else
		{
		return Url::to(['/'.$this->alias.'/'], true);	
		}
    }
}
