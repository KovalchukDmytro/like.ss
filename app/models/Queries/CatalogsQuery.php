<?php

namespace app\models\Queries;

/**
 * This is the ActiveQuery class for [[\app\models\Catalogs]].
 *
 * @see \app\models\Catalogs
 */
class CatalogsQuery extends \yii\db\ActiveQuery
{

    /**
     * @inheritdoc
     * @return \app\models\Catalogs[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Catalogs|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function active()
    {
        return $this->andWhere(['status' => 1]);
    }
    public function byAlias($alias)
    {
        return $this->andWhere(['alias' => $alias]);
    }
}
