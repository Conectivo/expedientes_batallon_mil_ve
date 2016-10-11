<?php

namespace app\models;

use Yii;

/**
 * Esta es la clase de modelo de la tabla "unidades".
 *
 * @property integer $id
 * @property string $unidad
 * @property string $fecha_ingreso
 *
 * @property Persona[] $personas
 */
class Unidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['unidad'], 'required',
                'message' => 'Este campo es requerido. Por favor, ingrese un valor.'
            ],
            [['unidad'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'unidad' => 'Nombre de Unidad',
            'fecha_ingreso' => 'Fecha de Ingreso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['unidad_id' => 'id']);
    }

}
