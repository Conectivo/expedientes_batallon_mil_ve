<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Captador]].
 *
 * @see Captador
 */
class CaptadorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Captador[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Captador|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
