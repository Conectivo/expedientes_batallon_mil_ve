<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Oficiales]].
 *
 * @see Oficiales
 */
class OficialesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Oficiales[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Oficiales|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
