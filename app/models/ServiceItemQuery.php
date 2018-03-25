<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ServiceItem]].
 *
 * @see ServiceItem
 */
class ServiceItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ServiceItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ServiceItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
