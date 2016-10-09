<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property integer $lugar_nacimiento
 * @property string $fecha_nacimiento
 * @property string $direccion
 * @property string $sector
 * @property string $telefono_movil
 * @property integer $religion
 * @property string $estado_civil
 * @property string $modalidad
 * @property string $fecha_ingreso
 * @property integer $unidad_id
 *
 * @property Captador[] $captadors
 * @property Familiares $familiares
 * @property Fisionomia $fisionomia
 * @property Parroquias $lugarNacimiento
 * @property Unidad $unidad
 * @property RasgosFisicos $rasgosFisicos
 * @property Sociologicos $sociologicos
 * @property Tallas $tallas
 */
class Persona extends \yii\db\ActiveRecord
{
    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['S'=>'Soltero(a)', 'C'=>'Casado(a)', 'V'=>'Viudo(a)'],
    */
    const EDOCIVIL_S = 'S';
    const EDOCIVIL_C = 'C';
    const EDOCIVIL_V = 'V';

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['1'=>'Catolicismo', '2'=>'Protestante','3'=>'Movimiento de los Santos de los Últimos Días',
       '4'=>'Judaísmo','5'=>'Islam','6'=>'Budismo','7'=>'Santería Caribeña','8'=>'Espiritismo',
       '9'=>'Ateísmo','10'=>'Otra creencia'],
    */
    const RELIG_CATO = 1;
    const RELIG_PROT = 2;
    const RELIG_MORM = 3;
    const RELIG_JUDA = 4;
    const RELIG_ISLA = 5;
    const RELIG_BUDI = 6;
    const RELIG_SANT = 7;
    const RELIG_ESPI = 8;
    const RELIG_ATEI = 9;
    const RELIG_OTRA = 10;

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['C'=>'Tiempo completo', 'P'=>'Tiempo parcial'],
    */
    const TIEMPO_COMPLETO = 'C';
    const TIEMPO_PARCIAL = 'P';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombres', 'apellidos', 'lugar_nacimiento', 'fecha_nacimiento', 'direccion', 'sector', 'telefono_movil', 'fecha_ingreso'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [['religion', 'estado_civil', 'modalidad', 'unidad_id'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['fecha_nacimiento', 'fecha_ingreso'], 'safe'],
            [['religion'], 'integer'],
            [['nombres', 'apellidos'], 'string', 'max' => 20],
            [['direccion', 'sector'], 'string', 'max' => 150],
            [['estado_civil'], 'string', 'max' => 1],
            [['telefono_movil'], 'string', 'max' => 14],
            [['cedula'], 'unique'],
            [['cedula'], 'match', 'pattern' => '/^\d\d\d\d\d\d\d\d$/', 'message' => 'Este campo es requerido. Por favor, ingrese en formato numérico la Cédula de identidad, como este 14522590.'],
            [['telefono_movil'], 'match', 'pattern' => '/^[4]\d\d?[- .]?\d\d\d[- .]?\d\d\d\d$/', 'message' => 'Este campo es requerido. Por favor, ingrese un formato de numero Teléfonico, como estos 426-771-3573 o 276-762-6182.'],
            [['lugar_nacimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquias::className(), 'targetAttribute' => ['lugar_nacimiento' => 'id_parroquia']],
            // [['modalidad'], 'string', 'max' => 1],
            // ['modalidad', 'default', 'value' => self::TIEMPO_COMPLETO],
            ['modalidad', 'in', 'range' => array_keys($this->getOpcionesModalidad())],
            [['unidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::className(), 'targetAttribute' => ['unidad_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedula' => 'Cédula',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'lugar_nacimiento' => 'Lugar de Nacimiento',
            'fecha_nacimiento' => 'Fecha de Nacimiento',
            'direccion' => 'Dirección',
            'sector' => 'Sector',
            'telefono_movil' => 'Teléfono Celular',
            'religion' => 'Religión',
            'estado_civil' => 'Estado Civil',
            'modalidad' => 'Modalidad',
            'unidad_id' => 'Unidad de Batallón',
        ];
    }
 
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaptadors()
    {
        return $this->hasMany(Captador::className(), ['captado' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamiliares()
    {
        return $this->hasOne(Familiares::className(), ['cedula_id' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFisionomia()
    {
        return $this->hasOne(Fisionomia::className(), ['cedula_id' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarNacimiento()
    {
        return $this->hasOne(Parroquias::className(), ['id_parroquia' => 'lugar_nacimiento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnidad()
    {
        return $this->hasOne(Unidad::className(), ['id' => 'unidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSociologicos()
    {
        return $this->hasOne(Sociologicos::className(), ['cedula_id' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallas()
    {
        return $this->hasOne(Tallas::className(), ['cedula_id' => 'cedula']);
    }

    /**
     * Obtén el nombre completo del personal de batallón.
     * @return string el nombre completo del personal.
     */
    public function getFullName()
    {
        $fullName = (! empty ( $this->nombres )) ? $this->nombres : '';
        $fullName .= (! empty ( $this->apellidos )) ? ((! empty ( $fullName )) ? " " . $this->apellidos : $this->apellidos) : '';
        return $fullName;
    }

    /**
     * Retorna la descripcion del campo [[estado_civil]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getEdoCivil()
    {
        if ($this->estado_civil=='S') {
            return $this->getTextoEdoCivil();
        }
        
        if ($this->estado_civil=='C') {
            return $this->getTextoEdoCivil();
        }
        
        if ($this->estado_civil=='V') {
            return $this->getTextoEdoCivil();
        }
    }

    /**
     * Retorna la descripcion del campo [[religion]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getReligion()
    {
        if ($this->religion==1) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==2) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==3) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==4) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==5) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==6) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==7) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==8) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==9) {
            return $this->getTextoReligion();
        }
        
        if ($this->religion==10) {
            return $this->getTextoReligion();
        }
    }

    /**
     * Retorna la descripcion del campo [[modalidad]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getModalidad()
    {
        if ($this->modalidad=='C') {
            return $this->getTextoModalidad();
        }
        
        if ($this->modalidad=='P') {
            return $this->getTextoModalidad();
        }
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[religion]]
     *
     * @return array
     */
    public function getOpcionesReligion()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::RELIG_CATO => 'Catolicismo',
            self::RELIG_PROT => 'Protestante',
            self::RELIG_MORM => 'Movimiento de los Santos de los Últimos Días',
            self::RELIG_JUDA => 'Judaísmo',
            self::RELIG_ISLA => 'Islam',
            self::RELIG_BUDI => 'Budismo',
            self::RELIG_SANT => 'Santería Caribeña',
            self::RELIG_ESPI => 'Espiritismo',
            self::RELIG_ATEI => 'Ateísmo',
            self::RELIG_OTRA => 'Otra creencia',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[estado_civil]]
     *
     * @return array
     */
    public function getOpcionesEdoCivil()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::EDOCIVIL_S => 'Soltero(a)',
            self::EDOCIVIL_C => 'Casado(a)',
            self::EDOCIVIL_V => 'Viudo(a)',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[modalidad]]
     *
     * @return array
     */
    public function getOpcionesModalidad()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::TIEMPO_COMPLETO => 'Tiempo completo',
            self::TIEMPO_PARCIAL => 'Tiempo parcial',
        ];
    }

    /**
     * Retorna el valor de texto de la propiedad [[religion]].
     * 
     * @return string la propiedad [[religion]] como una cadena de texto para su visualizacion.
     */
    public function getTextoReligion()
    {
        $options = $this->getOpcionesReligion();
        return isset($options[$this->religion]) ? $options[$this->religion] : '';
    }

    /**
     * Retorna el valor de texto de la propiedad [[estado_civil]].
     * 
     * @return string la propiedad [[estado_civil]] como una cadena de texto para su visualizacion.
     */
    public function getTextoEdoCivil()
    {
        $options = $this->getOpcionesEdoCivil();
        return isset($options[$this->estado_civil]) ? $options[$this->estado_civil] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[modalidad]].
     * 
     * @return string la propiedad [[modalidad]] como una cadena de texto para su visualizacion.
     */
    public function getTextoModalidad()
    {
        $options = $this->getOpcionesModalidad();
        return isset($options[$this->modalidad]) ? $options[$this->modalidad] : '';
    }
}
