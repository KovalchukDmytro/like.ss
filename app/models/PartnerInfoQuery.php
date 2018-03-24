<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PartnerInfo]].
 *
 * @see PartnerInfo
 */
class PartnerInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PartnerInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PartnerInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
