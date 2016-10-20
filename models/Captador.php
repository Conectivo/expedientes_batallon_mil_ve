<?php

namespace app\models;

use Yii;

/**
 * Esta es la clase de modelo de la tabla "captador".
 *
 * @property integer $id
 * @property integer $jquia_id
 * @property integer $cedula
 * @property string $nombre_completo
 * @property string $telefono
 * @property integer $captado
 *
 * @property Jerarquia $jquia
 * @property Persona $captado0
 */
class Captador extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'captador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['cedula', 'nombre_completo', 'telefono'], 'required',
                'message' => 'Este campo es requerido. Por favor, ingrese un valor.'
            ],
            [
                ['jquia_id', 'captado'], 'required',
                'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'
            ],
            [
                ['nombre_completo'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese un nombre real de persona, ej. Leonardo Caballero.'
            ],
            [
                ['telefono'], 'match', 'pattern' => '/^(\0)?[0-9]{11,11}$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un número teléfonico, ej. 04267713573 o 02767626182.'
            ],
            [
                ['cedula'], 'match', 'pattern' => '/^(\0)?[0-9]{8,8}$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un número de cédula de identidad, ej. 14522590.'
            ],
            [['jquia_id', 'cedula', 'captado'], 'integer'],
            [['nombre_completo'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 14],
            [['captado'], 'unique', 'message' => 'Personal ya fue registrado por otro Captador. Por favor, seleccioné otro Personal.'],
            [['jquia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jerarquia::className(), 'targetAttribute' => ['jquia_id' => 'id']],
            [
                ['captado'], 'exist', 'skipOnError' => true,
                'targetClass' => Persona::className(),
                'targetAttribute' => ['captado' => 'cedula']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'jquia_id' => 'Jerarquía',
            'cedula' => 'Cédula',
            'nombre_completo' => 'Nombre Completo',
            'telefono' => 'Teléfono',
            'captado' => 'Personal Captado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJquia()
    {
        return $this->hasOne(Jerarquia::className(), ['id' => 'jquia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaptado0()
    {
        return $this->hasOne(Persona::className(), ['cedula' => 'captado']);
    }

    /**
     * @inheritdoc
     * @return CaptadorQuery el objeto Active Query usado por esta clase ActiveRecord.
     */
    public static function find()
    {
        return new CaptadorQuery(get_called_class());
    }

}
