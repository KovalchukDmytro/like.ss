<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BannerInfo]].
 *
 * @see BannerInfo
 */
class BannerInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BannerInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BannerInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
