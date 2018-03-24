<?php

namespace app\models\Queries;

/**
 * This is the ActiveQuery class for [[\app\models\ArticlesCategories]].
 *
 * @see \app\models\ArticlesCategories
 */
class ArticlesCategoriesQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return \app\models\ArticlesCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ArticlesCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function active()
    {
        return $this->andWhere(['articles_categories.status' => 1]);
    }
    
    public function byAlias($alias)
    {
        return $this->andWhere(['articles_categories.alias' => $alias]);
    }
}
