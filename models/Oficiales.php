<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oficiales".
 *
 * @property integer $id
 * @property string $jquia
 * @property string $nombres
 * @property string $apellido
 * @property integer $cedula
 * @property string $situacion
 * @property string $email
 * @property string $arma
 * @property string $cargo
 * @property string $direccion
 * @property integer $telefono
 * @property string $direccion_emergencia
 * @property integer $telefonos_emergencia
 */
class Oficiales extends \yii\db\ActiveRecord
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

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['1'=>'Disponible', '2'=>'Comisión', '3'=>'Operación Centinela', '4'=>'Permiso', '5'=>'Otra'],
    */
    const SITUAC_DIP = 1;
    const SITUAC_COM = 2;
    const SITUAC_OPC = 3;
    const SITUAC_PER = 4;
    const SITUAC_OTR = 5;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oficiales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jquia', 'situacion'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['nombres', 'apellido', 'cedula', 'arma', 'cargo', 'direccion', 'telefono', 'direccion_emergencia', 'telefonos_emergencia'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [
                ['nombres'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese los nombres reales de persona, ej. Leonardo Jóse.'
            ],
            [
                ['apellido'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese los apellidos reales de persona, ej. Caballero Garcia.'
            ],
            [
                ['arma', 'cargo'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese solo letras en minúsculas o en capitales.'
            ],
            [
                ['telefono', 'telefonos_emergencia'], 'match', 'pattern' => '/^(\0)?[0-9]{11,11}$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un número teléfonico, ej. 04267713573 o 02767626182.'
            ],
            [['cedula'], 'integer'],
            [
                ['cedula'], 'match', 'pattern' => '/^(\0)?[0-9]{8,8}$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un formato numérico para la cédula de identidad, ej. 14522590.'
            ],
            [['telefono', 'telefonos_emergencia'], 'string', 'max' => 14],
            [['jquia', 'nombres', 'apellido', 'arma'], 'string', 'max' => 20],
            [['email'], 'email', 'message' => 'Este campo no es una dirección de correo valida.'],
            [['email', 'direccion', 'direccion_emergencia', 'cargo'], 'string', 'max' => 50],
            [['cedula'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'jquia' => 'Jerarquía',
            'nombres' => 'Nombres',
            'apellido' => 'Apellido',
            'cedula' => 'Cédula',
            'situacion' => 'Situación',
            'email' => 'Correo electrónico',
            'arma' => 'Arma',
            'cargo' => 'Cargo',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'direccion_emergencia' => 'Dirección de Emergencia',
            'telefonos_emergencia' => 'Teléfonos de Emergencia',
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
     * Retorna la descripcion del campo [[situacion]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getSituacion()
    {
        if ($this->situacion==1) {
            return $this->getTextoSituacion();
        }
        
        if ($this->situacion==2) {
            return $this->getTextoSituacion();
        }
        
        if ($this->situacion==3) {
            return $this->getTextoSituacion();
        }
        
        if ($this->situacion==4) {
            return $this->getTextoSituacion();
        }
        
        if ($this->situacion==5) {
            return $this->getTextoSituacion();
        }
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
     * Retorna un arreglo usado en la lista desplegable para el campo [[situacion]]
     *
     * @return array
     */
    public function getOpcionesSituacion()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::SITUAC_DIP => 'Disponible',
            self::SITUAC_COM => 'Comisión',
            self::SITUAC_OPC => 'Operación Centinela',
            self::SITUAC_PER => 'Permiso',
            self::SITUAC_OTR => 'Otra',
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

    /**
     * Retorna el valor de texto de la propiedad [[situacion]].
     * 
     * @return string la propiedad [[situacion]] como una cadena de texto para su visualizacion.
     */
    public function getTextoSituacion()
    {
        $options = $this->getOpcionesSituacion();
        return isset($options[$this->situacion]) ? $options[$this->situacion] : '';
    }
}
