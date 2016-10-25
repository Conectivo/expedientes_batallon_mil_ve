<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Unidad]].
 *
 * @see Unidad
 */
class UnidadesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Unidad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Unidad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
