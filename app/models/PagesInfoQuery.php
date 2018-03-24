<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PagesInfo]].
 *
 * @see PagesInfo
 */
class PagesInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PagesInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PagesInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
