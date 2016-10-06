<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property integer $id_municipio
 * @property integer $id_estado
 * @property string $municipio
 *
 * @property Estados $idEstado
 * @property Parroquias[] $parroquias
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'municipio'], 'required'],
            [['id_estado'], 'integer'],
            [['municipio'], 'string', 'max' => 100],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_municipio' => 'Id del Municipio',
            'id_estado' => 'Id del Estado',
            'municipio' => 'Nombre del Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(Estados::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquias::className(), ['id_municipio' => 'id_municipio']);
    }
}
