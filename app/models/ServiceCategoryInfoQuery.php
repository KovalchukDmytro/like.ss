<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ServiceCategoryInfo]].
 *
 * @see ServiceCategoryInfo
 */
class ServiceCategoryInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ServiceCategoryInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ServiceCategoryInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
