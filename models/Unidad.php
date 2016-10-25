<?php

namespace app\models;

use Yii;

/**
 * Esta es la clase de modelo de la tabla "unidades".
 *
 * @property integer $id
 * @property string $nombre
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
                ['nombre'], 'required',
                'message' => 'Este campo es requerido. Por favor, ingrese un valor.'
            ],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'nombre' => 'Nombre de Unidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['unidad_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return UnidadesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UnidadesQuery(get_called_class());
    }

}
