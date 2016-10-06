<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "captador".
 *
 * @property integer $id
 * @property integer $jquia
 * @property integer $cedula
 * @property string $nombre_completo
 * @property string $telefono
 * @property integer $captado
 *
 * @property Persona $captado0
 */
class Captador extends \yii\db\ActiveRecord
{
    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['1'=>'Tcnel', '2'=>'My', '3'=>'Cap', '4'=>'1Tte', '5'=>'Tte', '6'=>'S/Sup',
    *  '7'=>'SM/1ra', '8'=>'SM/2da', '9'=>'SM/3ra', '10'=>'S/1ro', '11'=>'S/2do'],
    */
    const JQUIA_TCNEL = 1;
    const JQUIA_MY = 2;
    const JQUIA_CAP = 3;
    const JQUIA_1TTE = 4;
    const JQUIA_TTE = 5;
    const JQUIA_SSUP = 6;
    const JQUIA_SM1RA = 7;
    const JQUIA_SM2DA = 8;
    const JQUIA_SM3RA = 9;
    const JQUIA_S1RO = 10;
    const JQUIA_S2DO = 11;

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
                ['jquia', 'captado'], 'required',
                'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'
            ],
            [
                ['telefono'], 'match', 'pattern' => '/^[4]\d\d?[- .]?\d\d\d[- .]?\d\d\d\d$/', 
                'message' => 'Este campo es requerido. Por favor, ingrese un número teléfonico, ej. 426-771-3573 o 276-762-6182.'
            ],
            [
                ['cedula'], 'match', 'pattern' => '/^\d\d\d\d\d\d\d\d$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un número de cédula de identidad, ej. 14522590.'
            ],
            [['jquia', 'cedula', 'captado'], 'integer'],
            [['nombre_completo'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 14],
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
            'jquia' => 'Jerarquía',
            'cedula' => 'Cédula',
            'nombre_completo' => 'Nombre Completo',
            'telefono' => 'Teléfono',
            'captado' => 'Personal Captado',
        ];
    }

    /**
     * Retorna la descripcion del campo [[jquia]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getJerarquia()
    {
        if ($this->jquia==1) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==2) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==3) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==4) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==5) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==6) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==7) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==8) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==9) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==10) {
            return $this->getTextoJquia();
        }
        
        if ($this->jquia==11) {
            return $this->getTextoJquia();
        }
    }
 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaptado0()
    {
       return $this->hasOne(Persona::className(), ['cedula' => 'captado']);
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[jquia]]
     *
     * @return array
     */
    public function getOpcionesJquia()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::JQUIA_TCNEL => 'Tcnel',
            self::JQUIA_MY => 'My',
            self::JQUIA_CAP => 'Cap',
            self::JQUIA_1TTE => '1Tte',
            self::JQUIA_TTE => 'Tte',
            self::JQUIA_SSUP => 'S/Sup',
            self::JQUIA_SM1RA => 'SM/1ra',
            self::JQUIA_SM2DA => 'SM/2da',
            self::JQUIA_SM3RA => 'SM/3ra',
            self::JQUIA_S1RO => 'S/1ro',
            self::JQUIA_S2DO => 'S/2do',
        ];
    }

    /**
     * Retorna el valor de texto de la propiedad [[jquia]].
     * 
     * @return string la propiedad [[jquia]] como una cadena de texto para su visualizacion.
     */
    public function getTextoJquia()
    {
        $options = $this->getOpcionesJquia();
        return isset($options[$this->jquia]) ? $options[$this->jquia] : '';
    }
}
