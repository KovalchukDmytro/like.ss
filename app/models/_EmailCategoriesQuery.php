<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EmailCategories]].
 *
 * @see EmailCategories
 */
class EmailCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EmailCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmailCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
