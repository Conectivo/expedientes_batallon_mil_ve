<?php

namespace app\models;

use Yii;

/**
 * Esta es la clase de modelo de la tabla "oficiales".
 *
 * @property integer $id
 * @property integer $jquia_id
 * @property string $nombres
 * @property string $apellidos
 * @property integer $cedula
 * @property string $sexo
 * @property integer $situacion
 * @property string $email
 * @property string $arma
 * @property string $cargo
 * @property string $direccion
 * @property string $telefono
 * @property string $direccion_emergencia
 * @property string $telefonos_emergencia
 *
 * @property Jerarquia $jquia
 */
class Oficiales extends \yii\db\ActiveRecord
{
    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['Masculino'=>'Masculino', 'Femenino'=>'Femenino'],
    */
    const SEXO_M = 'Masculino';
    const SEXO_F = 'Femenino';

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
            [['jquia_id', 'sexo', 'situacion'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['nombres', 'apellidos', 'cedula', 'arma', 'cargo', 'direccion', 'telefono', 'direccion_emergencia', 'telefonos_emergencia'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [
                ['nombres'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese los nombres reales de persona, ej. Leonardo Jóse.'
            ],
            [
                ['apellidos'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
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
            [['jquia_id', 'cedula', 'situacion'], 'integer'],
            [
                ['cedula'], 'match', 'pattern' => '/^(\0)?[0-9]{8,8}$/', // /^[0-9]{8}$/ 'message' => 'Debe ser numérico y tamano 8'
                'message' => 'Este campo es requerido. Por favor, ingrese un formato numérico para la cédula de identidad, ej. 14522590.'
            ],
            [
                ['email'], 'email',
                'message' => 'Este campo no es una dirección de correo valida.'
            ],
            [['nombres', 'apellidos', 'arma'], 'string', 'max' => 20],
            [['sexo'], 'string', 'max' => 10],
            [['email', 'cargo'], 'string', 'max' => 50],
            [['direccion', 'direccion_emergencia'], 'string', 'max' => 150],
            [['telefono', 'telefonos_emergencia'], 'string', 'max' => 14],
            [['cedula'], 'unique'],
            [['email'], 'unique'],
            [['jquia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jerarquia::className(), 'targetAttribute' => ['jquia_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'jquia_id' => 'Jerarquía',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'cedula' => 'Cédula',
            'sexo' => 'Sexo',
            'situacion' => 'Situación',
            'email' => 'Correo electrónico',
            'arma' => 'Arma',
            'cargo' => 'Cargo designado',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'direccion_emergencia' => 'Dirección de Emergencia',
            'telefonos_emergencia' => 'Teléfonos de Emergencia',
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
     * @inheritdoc
     * @return OficialesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OficialesQuery(get_called_class());
    }

    /**
     * Retorna la descripcion del campo [[sexo]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getSexo()
    {
        if ($this->sexo=='Masculino') {
            return $this->getTextoSexo();
        }
        
        if ($this->sexo=='Femenino') {
            return $this->getTextoSexo();
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
     * Retorna un arreglo usado en la lista desplegable para el campo [[sexo]]
     *
     * @return array
     */
    public function getOpcionesSexo()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::SEXO_M => 'Masculino',
            self::SEXO_F => 'Femenino',
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
     * Retorna el valor de texto de la propiedad [[sexo]].
     * 
     * @return string la propiedad [[sexo]] como una cadena de texto para su visualizacion.
     */
    public function getTextoSexo()
    {
        $options = $this->getOpcionesSexo();
        return isset($options[$this->sexo]) ? $options[$this->sexo] : '';
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
