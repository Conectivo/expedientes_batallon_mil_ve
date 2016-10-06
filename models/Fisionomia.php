<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fisionomia".
 *
 * @property integer $cedula_id
 * @property string $color_piel
 * @property string $color_cabello
 * @property integer $color_ojos
 * @property string $contextura
 * @property string $condicion_fisica
 * @property string $condicion_intelectual
 * @property string $estatura
 * @property double $peso
 * @property integer $grupo_sanguineo
 * @property string $senales_particulares
 *
 * @property Persona $cedula
 */
class Fisionomia extends \yii\db\ActiveRecord
{
    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['1'=>'O-', '2'=>'O+', '3'=>'A-', '4'=>'A+', '5'=>'AB-', '6'=>'AB+'],
    */
    const SANGRE_O1 = 1;
    const SANGRE_O2 = 2;
    const SANGRE_A1 = 3;
    const SANGRE_A2 = 4;
    const SANGRE_AB1 = 5;
    const SANGRE_AB2 = 6;

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['A'=>'Apto', 'N'=>'No Apto'],
    */
    const ACTO_S = 'A';
    const ACTO_N = 'N';

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['1'=>'Castaño', '2'=>'Ámbar', '3'=>'Avellana', '4'=>'Verde', '5'=>'Azul', '6'=>'Gris'],
    */
    const OJO_CASTANO = 1;
    const OJO_AMBAR = 2;
    const OJO_AVELLANA = 3;
    const OJO_VERDE = 4;
    const OJO_AZUL = 5;
    const OJO_GRIS = 6;

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['N'=>'Negro','C'=>'Castaño','R'=>'Rubio (Castaño claro)','P'=>'Pelirrojo (Rojo anaranjado)','G'=>'Gris','B'=>'Blanco'],
    */
    const CABELLO_N = 'N';
    const CABELLO_C = 'C';
    const CABELLO_R = 'R';
    const CABELLO_P = 'P';
    const CABELLO_G = 'G';
    const CABELLO_B = 'B';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fisionomia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['color_piel', 'contextura', 'estatura', 'peso', 'senales_particulares'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [['cedula_id', 'color_cabello', 'color_ojos', 'condicion_fisica', 'condicion_intelectual', 'grupo_sanguineo'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['cedula_id', 'grupo_sanguineo', 'color_ojos'], 'integer'],
            // [['estatura'], 'safe'],
            [['estatura'], 'number', 'message' => 'Por favor, ingrese un formato numérico, ej. formato de estatura, como 1.75.'],
            [['peso'], 'number', 'message' => 'Por favor, ingrese un formato numérico, ej. formato de peso, como 65 o 120.93.'],
            [['color_piel', 'contextura'], 'string', 'max' => 20],
            [['senales_particulares'], 'string', 'max' => 50],
            [['color_cabello', 'condicion_fisica', 'condicion_intelectual'], 'string', 'max' => 1],
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
            'color_piel' => 'Color de Piel',
            'color_cabello' => 'Color de Cabello',
            'color_ojos' => 'Color de Ojos',
            'contextura' => 'Contextura',
            'condicion_fisica' => 'Condición Física',
            'condicion_intelectual' => 'Condición Intelectual',
            'estatura' => 'Estatura',
            'peso' => 'Peso',
            'grupo_sanguineo' => 'Grupo Sanguíneo',
            'senales_particulares' => 'Señales Particulares',
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
     * Retorna la descripcion del campo [[color_cabello]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getColorCabello()
    {
        if ($this->color_cabello=='N') {
            return $this->getTextoColorCabello();
        }

        if ($this->color_cabello=='C') {
            return $this->getTextoColorCabello();
        }

        if ($this->color_cabello=='R') {
            return $this->getTextoColorCabello();
        }

        if ($this->color_cabello=='P') {
            return $this->getTextoColorCabello();
        }

        if ($this->color_cabello=='G') {
            return $this->getTextoColorCabello();
        }

        if ($this->color_cabello=='B') {
            return $this->getTextoColorCabello();
        }
    }

    /**
     * Retorna la descripcion del campo [[color_ojos]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getColorOjos()
    {
        if ($this->color_ojos==1) {
            return $this->getTextoColorOjos();
        }

        if ($this->color_ojos==2) {
            return $this->getTextoColorOjos();
        }

        if ($this->color_ojos==3) {
            return $this->getTextoColorOjos();
        }

        if ($this->color_ojos==4) {
            return $this->getTextoColorOjos();
        }

        if ($this->color_ojos==5) {
            return $this->getTextoColorOjos();
        }

        if ($this->color_ojos==6) {
            return $this->getTextoColorOjos();
        }
    }

    /**
     * Retorna la descripcion del campo [[condicion_fisica]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getCondicionF()
    {
        if ($this->condicion_fisica=='A') {
            return $this->getTextoCondicionF();
        }

        if ($this->condicion_fisica=='N') {
            return $this->getTextoCondicionF();
        }
    }

    /**
     * Retorna la descripcion del campo [[condicion_intelectual]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getCondicionI()
    {
        if ($this->condicion_intelectual=='A') {
            return $this->getTextoCondicionI();
        }

        if ($this->condicion_intelectual=='N') {
            return $this->getTextoCondicionI();
        }
    }

    /**
     * Retorna la descripcion del campo [[grupo_sanguineo]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getGrupoSangre()
    {
        if ($this->grupo_sanguineo==1) {
            return $this->getTextoGrupoSangre();
        }

        if ($this->grupo_sanguineo==2) {
            return $this->getTextoGrupoSangre();
        }

        if ($this->grupo_sanguineo==3) {
            return $this->getTextoGrupoSangre();
        }

        if ($this->grupo_sanguineo==4) {
            return $this->getTextoGrupoSangre();
        }

        if ($this->grupo_sanguineo==5) {
            return $this->getTextoGrupoSangre();
        }

        if ($this->grupo_sanguineo==6) {
            return $this->getTextoGrupoSangre();
        }
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[color_cabello]]
     *
     * @return array
     */
    public function getOpcionesColorCabello()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            * Fuente: https://es.wikipedia.org/wiki/Color_del_pelo#Colores_naturales_de_pelo
            */
            self::CABELLO_N => 'Negro',
            self::CABELLO_C => 'Castaño',
            self::CABELLO_R => 'Rubio (Castaño claro)',
            self::CABELLO_P => 'Pelirrojo (Rojo anaranjado)',
            self::CABELLO_G => 'Gris',
            self::CABELLO_B => 'Blanco',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[color_ojos]]
     *
     * @return array
     */
    public function getOpcionesColorOjos()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            * Fuente: https://es.wikipedia.org/wiki/Color_de_ojos#Colores_en_seres_humanos
            */
            self::OJO_CASTANO => 'Castaño',
            self::OJO_AMBAR => 'Ámbar',
            self::OJO_AVELLANA => 'Avellana',
            self::OJO_VERDE => 'Verde',
            self::OJO_AZUL => 'Azul',
            self::OJO_GRIS => 'Gris',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para los campos [[condicion_fisica]] y [[condicion_intelectual]]
     *
     * @return array
     */
    public function getOpcionesCondicion()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::ACTO_S =>'Apto',
            self::ACTO_N =>'No Apto',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[grupo_sanguineo]]
     *
     * @return array
     */
    public function getOpcionesGrupoSangre()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::SANGRE_O1 =>'O-',
            self::SANGRE_O2 =>'O+',
            self::SANGRE_A1 =>'A-',
            self::SANGRE_A2 =>'A+',
            self::SANGRE_AB1 => 'AB-',
            self::SANGRE_AB2 => 'AB+',
        ];
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[color_cabello]].
     * 
     * @return string la propiedad [[color_cabello]] como una cadena de texto para su visualizacion.
     */
    public function getTextoColorCabello()
    {
        $options = $this->getOpcionesColorCabello();
        return isset($options[$this->color_cabello]) ? $options[$this->color_cabello] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[color_ojos]].
     * 
     * @return string la propiedad [[color_ojos]] como una cadena de texto para su visualizacion.
     */
    public function getTextoColorOjos()
    {
        $options = $this->getOpcionesColorOjos();
        return isset($options[$this->color_ojos]) ? $options[$this->color_ojos] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[condicion_fisica]].
     * 
     * @return string la propiedad [[condicion_fisica]] como una cadena de texto para su visualizacion.
     */
    public function getTextoCondicionF()
    {
        $options = $this->getOpcionesCondicion();
        return isset($options[$this->condicion_fisica]) ? $options[$this->condicion_fisica] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[condicion_intelectual]].
     * 
     * @return string la propiedad [[condicion_intelectual]] como una cadena de texto para su visualizacion.
     */
    public function getTextoCondicionI()
    {
        $options = $this->getOpcionesCondicion();
        return isset($options[$this->condicion_intelectual]) ? $options[$this->condicion_intelectual] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[grupo_sanguineo]].
     * 
     * @return string la propiedad [[grupo_sanguineo]] como una cadena de texto para su visualizacion.
     */
    public function getTextoGrupoSangre()
    {
        $options = $this->getOpcionesGrupoSangre();
        return isset($options[$this->grupo_sanguineo]) ? $options[$this->grupo_sanguineo] : '';
    }
}
