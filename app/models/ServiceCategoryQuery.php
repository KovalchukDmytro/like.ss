<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ServiceCategory]].
 *
 * @see ServiceCategory
 */
class ServiceCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ServiceCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ServiceCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
