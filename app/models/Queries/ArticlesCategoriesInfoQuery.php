<?php

namespace app\models\Queries;

/**
 * This is the ActiveQuery class for [[\app\models\ArticlesCategoriesInfo]].
 *
 * @see \app\models\ArticlesCategoriesInfo
 */
class ArticlesCategoriesInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \app\models\ArticlesCategoriesInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\ArticlesCategoriesInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
