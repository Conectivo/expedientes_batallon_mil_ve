<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property integer $id_estado
 * @property string $estado
 * @property string $iso_3166-2
 *
 * @property Ciudades[] $ciudades
 * @property Municipios[] $municipios
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado', 'iso_3166-2'], 'required'],
            [['estado'], 'string', 'max' => 250],
            [['iso_3166-2'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id del Estado',
            'estado' => 'Nombre del Estado',
            'iso_3166-2' => 'Código ISO 3166-2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudades()
    {
        return $this->hasMany(Ciudades::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipios()
    {
        return $this->hasMany(Municipios::className(), ['id_estado' => 'id_estado']);
    }
}
