<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "familiares".
 *
 * @property integer $cedula_id
 * @property string $nombre_madre
 * @property string $nombre_padre
 * @property string $nombre_conyugue
 * @property integer $cantidad_hijos
 * @property string $sit_padres
 *
 * @property Persona $cedula
 */
class Familiares extends \yii\db\ActiveRecord
{
    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['V'=>'Vivos', 'M'=>'Muertos'],
    */
    const STATUS_VIVOS = 'V';
    const STATUS_MUERTO = 'M';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'familiares';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id', 'sit_padres'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['cedula_id', 'nombre_madre', 'nombre_padre', 'nombre_conyugue', 'cantidad_hijos'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [['cedula_id', 'cantidad_hijos'], 'integer'],
            [['nombre_madre', 'nombre_padre', 'nombre_conyugue'], 'string', 'max' => 50],
            [['sit_padres'], 'string', 'max' => 1],
            [['cedula_id'], 'unique'],
            [['cedula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['cedula_id' => 'cedula']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedula_id' => 'Persona',
            'nombre_madre' => 'Nombre de la Madre',
            'nombre_padre' => 'Nombre del Padre',
            'nombre_conyugue' => 'Nombre del Cónyuge',
            'cantidad_hijos' => 'Cantidad de Hijos',
            'sit_padres' => 'Situación de los Padres',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCedula()
    {
        return $this->hasOne(Persona::className(), ['cedula' => 'cedula_id']);
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[sit_padres]]
     *
     * @return array
     */
    public function getOpcionesSitPadres()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::STATUS_VIVOS => 'Vivos',
            self::STATUS_MUERTO => 'Muertos'
        ];
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[sit_padres]].
     * 
     * @return string la propiedad [[sit_padres]] como una cadena de texto para su visualizacion.
     */
    public function getTextoEstatico()
    {
        $options = $this->getOpcionesSitPadres();
        return isset($options[$this->sit_padres]) ? $options[$this->sit_padres] : '';
    }
}
