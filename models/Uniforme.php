<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tallas".
 *
 * @property integer $cedula_id
 * @property string $tipo_talla
 * @property integer $gorra
 * @property integer $calzado
 *
 * @property Persona $cedula
 */
class Uniforme extends \yii\db\ActiveRecord
{
    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['XXS'=>'XXS', 'XS'=>'XS', 'S'=>'S', 'M'=>'M', 'L'=>'L', 'XL'=>'XL', 'XXL'=>'XXL', 'XXXL'=>'XXXL'],
    * Fuente: http://www.asics.com/es/es-es/clothing-size-guide
    */
    const TALLA_XXS = 'XXS';
    const TALLA_XS = 'XS';
    const TALLA_S = 'S';
    const TALLA_M = 'M';
    const TALLA_L = 'L';
    const TALLA_XL = 'XL';
    const TALLA_XXL = 'XXL';
    const TALLA_XXXL = 'XXXL';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tallas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id', 'tipo_talla'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['gorra', 'calzado'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [['cedula_id', 'gorra', 'calzado'], 'integer'],
            [['tipo_talla'], 'string', 'max' => 4],
            [['cedula_id'], 'unique'],
            // [
            //     ['gorra', 'calzado'], 'match', 'pattern' => '/(\d)/',
            //     'message' => 'Este campo es requerido. Por favor, ingrese un formato numérico, ej. 40 o 6.'
            // ],
            [
                ['cedula_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Persona::className(), 'targetAttribute' => ['cedula_id' => 'cedula']
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedula_id' => 'Persona',
            'tipo_talla' => 'Tallas',
            'gorra' => 'Gorra',
            'calzado' => 'Calzado',
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
     * Retorna la descripcion del campo [[tipo_talla]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getTalla()
    {
        if ($this->tipo_talla=='XXS') {
            return $this->getTextoTallas();
        }

        if ($this->tipo_talla=='XS') {
            return $this->getTextoTallas();
        }

        if ($this->tipo_talla=='S') {
            return $this->getTextoTallas();
        }

        if ($this->tipo_talla=='M') {
            return $this->getTextoTallas();
        }

        if ($this->tipo_talla=='L') {
            return $this->getTextoTallas();
        }

        if ($this->tipo_talla=='XL') {
            return $this->getTextoTallas();
        }
        
        if ($this->tipo_talla=='XXL') {
            return $this->getTextoTallas();
        }
        
        if ($this->tipo_talla=='XXXL') {
            return $this->getTextoTallas();
        }
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[tipo_talla]]
     *
     * @return array
     */
    public function getOpcionesTallas()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::TALLA_XXS => 'XXS',
            self::TALLA_XS => 'XS',
            self::TALLA_S => 'S',
            self::TALLA_M => 'M',
            self::TALLA_L => 'L',
            self::TALLA_XL => 'XL',
            self::TALLA_XXL => 'XXL',
            self::TALLA_XXXL => 'XXXL',
        ];
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[tipo_talla]].
     * 
     * @return string la propiedad [[tipo_talla]] como una cadena de texto para su visualizacion.
     */
    public function getTextoTallas()
    {
        $options = $this->getOpcionesTallas();
        return isset($options[$this->tipo_talla]) ? $options[$this->tipo_talla] : '';
    }
}
