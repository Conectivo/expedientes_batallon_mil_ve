<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Oficiales[] $oficiales
 * @property Persona[] $personas
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre del Género',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOficiales()
    {
        return $this->hasMany(Oficiales::className(), ['sexo' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['sexo' => 'id']);
    }

    /**
     * @inheritdoc
     * @return GeneroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GeneroQuery(get_called_class());
    }
}
