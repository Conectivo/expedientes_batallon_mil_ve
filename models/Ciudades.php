<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudades".
 *
 * @property integer $id_ciudad
 * @property integer $id_estado
 * @property string $ciudad
 * @property integer $capital
 *
 * @property Estados $idEstado
 */
class Ciudades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'ciudad'], 'required'],
            [['id_estado', 'capital'], 'integer'],
            [['ciudad'], 'string', 'max' => 200],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ciudad' => 'Id de Ciudad',
            'id_estado' => 'Id de Estado',
            'ciudad' => 'Nombre de Ciudad',
            'capital' => 'Capital',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(Estados::className(), ['id_estado' => 'id_estado']);
    }
}
