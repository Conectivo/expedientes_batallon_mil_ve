<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jerarquia".
 *
 * @property integer $id
 * @property string $nombre
 */
class Jerarquia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jerarquia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre de Jerarquía',
        ];
    }

    /**
     * @inheritdoc
     * @return JerarquiaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JerarquiaQuery(get_called_class());
    }
}
