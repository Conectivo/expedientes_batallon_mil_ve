<?php

namespace app\models;

use Yii;

/**
 * Esta es la clase de modelo de la tabla "persona".
 *
 * @property integer $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property integer $sexo_id
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property integer $parroquia_id
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
 * @property integer $status
 *
 * @property Captador $captador
 * @property Familiares $familiares
 * @property Fisionomia $fisionomia
 * @property Genero $sexo
 * @property Estados $estado
 * @property Municipios $municipio
 * @property Parroquias $parroquia
 * @property Ciudades $lugarNacimiento
 * @property Unidad $unidad
 * @property Sociologico $sociologico
 * @property Uniforme $uniforme
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
            [['cedula', 'nombres', 'apellidos', 'fecha_nacimiento', 'direccion', 'sector', 'telefono_movil', 'fecha_ingreso'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [['sexo_id', 'estado_id', 'municipio_id', 'parroquia_id', 'lugar_nacimiento', 'religion', 'estado_civil', 'modalidad', 'unidad_id'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['cedula', 'sexo_id', 'estado_id', 'municipio_id', 'parroquia_id', 'lugar_nacimiento', 'religion', 'unidad_id', 'status'], 'integer'],
            [['fecha_nacimiento', 'fecha_ingreso'], 'safe'],
            [['nombres', 'apellidos'], 'string', 'max' => 20],
            [['direccion', 'sector'], 'string', 'max' => 150],
            [['telefono_movil'], 'string', 'max' => 14],
            [['estado_civil', 'modalidad'], 'string', 'max' => 1],
            [['cedula'], 'unique'],
            [
                ['cedula'], 'match', 'pattern' => '/^(\0)?[0-9]{8,8}$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un formato numérico para la cédula de identidad, ej. 14522590.'
            ],
            [
                ['telefono_movil'], 'match', 'pattern' => '/^(\0)?[0-9]{11,11}$/',
                'message' => 'Este campo es requerido. Por favor, ingrese un número teléfonico, ej. 04267713573 o 02767626182.'
            ],
            [
                ['nombres'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese los nombres reales de persona, ej. Leonardo Jóse.'
            ],
            [
                ['apellidos'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese los apellidos reales de persona, ej. Caballero Garcia.'
            ],
            [
                ['lugar_nacimiento'], 'exist', 'skipOnError' => true,
                'targetClass' => Parroquias::className(), 'targetAttribute' => ['lugar_nacimiento' => 'id_parroquia']
            ],
            [
                ['sector'], 'match', 'pattern' => '/\b([A-Z][a-z.]+[ ]*)+/',
                'message' => 'Este campo es requerido. Por favor, ingrese solo letras en minúsculas o en capitales.'
            ],
            // ['modalidad', 'default', 'value' => self::TIEMPO_COMPLETO],
            ['modalidad', 'in', 'range' => array_keys($this->getOpcionesModalidad())],
            [['sexo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['sexo_id' => 'id']],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado_id' => 'id_estado']],
            [['municipio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['municipio_id' => 'id_municipio']],
            [['parroquia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquias::className(), 'targetAttribute' => ['parroquia_id' => 'id_parroquia']],
            [['lugar_nacimiento'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudades::className(), 'targetAttribute' => ['lugar_nacimiento' => 'id_ciudad']],
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
            'sexo_id' => 'Sexo',
            'estado_id' => 'Estado de nacimiento',
            'municipio_id' => 'Municipio de nacimiento',
            'parroquia_id' => 'Parroquia de nacimiento',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'direccion' => 'Dirección',
            'sector' => 'Sector',
            'telefono_movil' => 'Teléfono celular',
            'religion' => 'Religión',
            'estado_civil' => 'Estado civil',
            'modalidad' => 'Modalidad',
            'fecha_ingreso' => 'Fecha de ingreso',
            'unidad_id' => 'Unidad del batallón',
            'status' => 'Estatus del personal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaptador()
    {
        return $this->hasOne(Captador::className(), ['captado' => 'cedula']);
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
    public function getSexo()
    {
        return $this->hasOne(Genero::className(), ['id' => 'sexo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estados::className(), ['id_estado' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['id_municipio' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquia()
    {
        return $this->hasOne(Parroquias::className(), ['id_parroquia' => 'parroquia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarNacimiento()
    {
        return $this->hasOne(Ciudades::className(), ['id_ciudad' => 'lugar_nacimiento']);
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
    public function getSociologico()
    {
        return $this->hasOne(Sociologico::className(), ['cedula_id' => 'cedula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniforme()
    {
        return $this->hasOne(Uniforme::className(), ['cedula_id' => 'cedula']);
    }

    /**
     * @inheritdoc
     * @return PersonaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonaQuery(get_called_class());
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
