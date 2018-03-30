<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PortfolioItem]].
 *
 * @see PortfolioItem
 */
class PortfolioItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PortfolioItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PortfolioItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
