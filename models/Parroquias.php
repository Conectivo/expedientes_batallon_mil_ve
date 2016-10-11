<?php

namespace app\models;

use Yii;

/**
 * Esta es la clase de modelo de la tabla "parroquias".
 *
 * @property integer $id_parroquia
 * @property integer $id_municipio
 * @property string $parroquia
 *
 * @property Municipios $idMunicipio
 * @property Persona[] $personas
 * @property Persona[] $personas0
 */
class Parroquias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parroquias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_municipio', 'parroquia'], 'required'],
            [['id_municipio'], 'integer'],
            [['parroquia'], 'string', 'max' => 250],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['id_municipio' => 'id_municipio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_parroquia' => 'Id del Parroquia',
            'id_municipio' => 'Id del Municipio',
            'parroquia' => 'Nombre de Parroquia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['lugar_nacimiento' => 'id_parroquia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas0()
    {
        return $this->hasMany(Persona::className(), ['direccion' => 'id_parroquia']);
    }
}
