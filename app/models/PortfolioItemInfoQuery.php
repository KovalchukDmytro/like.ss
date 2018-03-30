<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PortfolioItemInfo]].
 *
 * @see PortfolioItemInfo
 */
class PortfolioItemInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PortfolioItemInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PortfolioItemInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
