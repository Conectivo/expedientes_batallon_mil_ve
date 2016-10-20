<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Jerarquia]].
 *
 * @see Jerarquia
 */
class JerarquiaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Jerarquia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Jerarquia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
