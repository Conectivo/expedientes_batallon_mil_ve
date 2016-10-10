<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sociologicos".
 *
 * @property integer $cedula_id
 * @property string $grado
 * @property string $profesion
 * @property string $vivienda
 *
 * @property Persona $cedula
 */
class Sociologico extends \yii\db\ActiveRecord
{

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['IP'=>'Inicial (Preescolar)', 'PB'=>'Primaria (Básica)',
    *  'MSG'=>'Media (Secundaria) - General', 'MST'=>'Media (Secundaria) - Técnica',
    *  'UPR'=>'Universitaria - Pre-grado', 'UPO'=>'Universitaria - Posgrado'],
    */
    const GRADO_INICIAL = 'IP';
    const GRADO_PRIMARIA = 'PB';
    const GRADO_SECUNDARIAG = 'MSG';
    const GRADO_SECUNDARIAT = 'MST';
    const GRADO_UNIPRE = 'UPR';
    const GRADO_UNIPOS = 'UPO';

    /* 
    * Definir los campos 'clave', como constante para siguiente arreglo dado 
    * ['S'=>'Si', 'N'=>'No'],
    */
    const VIVIENDA_SI = 'S';
    const VIVIENDA_NO = 'N';

    const PROFE_2 = 2;
    const PROFE_3 = 3;
    const PROFE_4 = 4;
    const PROFE_5 = 5;
    const PROFE_6 = 6;
    const PROFE_7 = 7;
    const PROFE_8 = 8;
    const PROFE_9 = 9;
    const PROFE_10 = 10;
    const PROFE_11 = 11;
    const PROFE_12 = 12;
    const PROFE_13 = 13;
    const PROFE_14 = 14;
    const PROFE_15 = 15;
    const PROFE_16 = 16;
    const PROFE_17 = 17;
    const PROFE_18 = 18;
    const PROFE_19 = 19;
    const PROFE_20 = 20;
    const PROFE_21 = 21;
    const PROFE_22 = 22;
    const PROFE_23 = 23;
    const PROFE_24 = 24;
    const PROFE_25 = 25;
    const PROFE_26 = 26;
    const PROFE_27 = 27;
    const PROFE_28 = 28;
    const PROFE_29 = 29;
    const PROFE_30 = 30;
    const PROFE_31 = 31;
    const PROFE_32 = 32;
    const PROFE_33 = 33;
    const PROFE_34 = 34;
    const PROFE_35 = 35;
    const PROFE_36 = 36;
    const PROFE_37 = 37;
    const PROFE_38 = 38;
    const PROFE_39 = 39;
    const PROFE_40 = 40;
    const PROFE_41 = 41;
    const PROFE_42 = 42;
    const PROFE_43 = 43;
    const PROFE_44 = 44;
    const PROFE_45 = 45;
    const PROFE_46 = 46;
    const PROFE_47 = 47;
    const PROFE_48 = 48;
    const PROFE_49 = 49;
    const PROFE_50 = 50;
    const PROFE_51 = 51;
    const PROFE_52 = 52;
    const PROFE_53 = 53;
    const PROFE_54 = 54;
    const PROFE_55 = 55;
    const PROFE_56 = 56;
    const PROFE_57 = 57;
    const PROFE_58 = 58;
    const PROFE_59 = 59;
    const PROFE_60 = 60;
    const PROFE_61 = 61;
    const PROFE_62 = 62;
    const PROFE_63 = 63;
    const PROFE_64 = 64;
    const PROFE_65 = 65;
    const PROFE_66 = 66;
    const PROFE_67 = 67;
    const PROFE_68 = 68;
    const PROFE_69 = 69;
    const PROFE_70 = 70;
    const PROFE_71 = 71;
    const PROFE_72 = 72;
    const PROFE_73 = 73;
    const PROFE_74 = 74;
    const PROFE_75 = 75;
    const PROFE_76 = 76;
    const PROFE_77 = 77;
    const PROFE_78 = 78;
    const PROFE_79 = 79;
    const PROFE_80 = 80;
    const PROFE_81 = 81;
    const PROFE_82 = 82;
    const PROFE_83 = 83;
    const PROFE_84 = 84;
    const PROFE_85 = 85;
    const PROFE_86 = 86;
    const PROFE_87 = 87;
    const PROFE_88 = 88;
    const PROFE_89 = 89;
    const PROFE_90 = 90;
    const PROFE_91 = 91;
    const PROFE_92 = 92;
    const PROFE_93 = 93;
    const PROFE_94 = 94;
    const PROFE_95 = 95;
    const PROFE_96 = 96;
    const PROFE_97 = 97;
    const PROFE_98 = 98;
    const PROFE_99 = 99;
    const PROFE_100 = 100;
    const PROFE_101 = 101;
    const PROFE_102 = 102;
    const PROFE_103 = 103;
    const PROFE_104 = 104;
    const PROFE_105 = 105;
    const PROFE_106 = 106;
    const PROFE_107 = 107;
    const PROFE_108 = 108;
    const PROFE_109 = 109;
    const PROFE_110 = 110;
    const PROFE_111 = 111;
    const PROFE_112 = 112;
    const PROFE_113 = 113;
    const PROFE_114 = 114;
    const PROFE_115 = 115;
    const PROFE_116 = 116;
    const PROFE_117 = 117;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sociologicos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id', 'grado'], 'required', 'message' => 'Este campo es requerido. Por favor, seleccioné una opción.'],
            [['profesion', 'vivienda'], 'required', 'message' => 'Este campo es requerido. Por favor, ingrese un valor.'],
            [['cedula_id'], 'integer'],
            [['grado', 'profesion', 'vivienda'], 'string', 'max' => 20],
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
            'grado' => 'Grado de instrucción',
            'profesion' => 'Profesión',
            'vivienda' => '¿Posee Vivienda?',
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
     * Retorna la descripcion del campo [[grado]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getGrado()
    {
        if ($this->grado=='IP') {
            return $this->getTextoGrado();
        }

        if ($this->grado=='PB') {
            return $this->getTextoGrado();
        }

        if ($this->grado=='MSG') {
            return $this->getTextoGrado();
        }

        if ($this->grado=='MST') {
            return $this->getTextoGrado();
        }

        if ($this->grado=='UPR') {
            return $this->getTextoGrado();
        }

        if ($this->grado=='UPO') {
            return $this->getTextoGrado();
        }
    }

    /**
     * Retorna la descripcion del campo [[profesion]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getProfesion()
    {
        // TODO evualuar usar funcion de rango de PHP para simplicar este codigo
        // Fuente http://php.net/manual/es/function.range.php
        if ($this->profesion==1) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==2) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==3) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==4) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==5) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==6) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==7) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==8) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==9) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==10) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==11) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==12) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==13) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==14) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==15) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==16) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==17) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==18) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==19) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==20) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==21) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==22) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==23) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==24) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==25) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==26) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==27) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==28) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==29) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==30) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==31) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==32) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==33) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==34) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==35) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==36) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==37) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==38) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==39) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==40) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==41) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==42) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==43) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==44) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==45) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==46) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==47) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==48) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==49) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==50) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==51) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==52) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==53) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==54) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==55) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==56) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==57) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==58) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==59) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==60) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==61) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==62) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==63) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==64) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==65) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==66) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==67) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==68) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==69) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==70) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==71) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==72) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==73) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==74) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==75) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==76) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==77) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==78) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==79) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==80) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==81) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==82) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==83) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==84) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==85) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==86) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==87) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==89) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==90) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==91) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==92) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==93) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==94) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==95) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==96) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==97) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==98) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==99) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==100) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==101) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==102) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==103) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==104) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==105) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==106) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==107) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==108) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==109) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==110) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==111) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==112) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==113) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==114) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==115) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==116) {
            return $this->getTextoProfesion();
        }

        if ($this->profesion==117) {
            return $this->getTextoProfesion();
        }
    }

    /**
     * Retorna la descripcion del campo [[vivienda]] para ser mostrado en las vistas
     *
     * @return array
     */
    public function getVivienda()
    {
        if ($this->vivienda=='S') {
            return $this->getTextoVivienda();
        }

        if ($this->vivienda=='N') {
            return $this->getTextoVivienda();
        }
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[grado]]
     *
     * @return array
     */
    public function getOpcionesGrado()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::GRADO_INICIAL => 'Inicial (Preescolar)',
            self::GRADO_PRIMARIA => 'Primaria (Básica)',
            self::GRADO_SECUNDARIAG => 'Media (Secundaria) - General',
            self::GRADO_SECUNDARIAT => 'Media (Secundaria) - Técnica',
            self::GRADO_UNIPRE => 'Universitaria - Pre-grado',
            self::GRADO_UNIPOS => 'Universitaria - Posgrado',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[vivienda]]
     *
     * @return array
     */
    public function getOpcionesVivienda()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::VIVIENDA_SI => 'Si',
            self::VIVIENDA_NO => 'No',
        ];
    }

    /**
     * Retorna un arreglo usado en la lista desplegable para el campo [[profesion]]
     *
     * @return array
     */
    public function getOpcionesProfesion()
    {
        return [
            /* 
            * Definir campos 'valor', de las constantes definidias previamente al inicio de la clase.
            */
            self::PROFE_2 => 'Carpintero',
            self::PROFE_3 => 'Plomero o fontanero',
            self::PROFE_4 => 'Electricista',
            self::PROFE_5 => 'Mecánico',
            self::PROFE_6 => 'Herrero',
            self::PROFE_7 => 'Artesano',
            self::PROFE_8 => 'Pintor de obras civiles',
            self::PROFE_9 => 'Cerrajero',
            self::PROFE_10 => 'Impresor',
            self::PROFE_11 => 'Zapatero',
            self::PROFE_12 => 'Barrendero',
            self::PROFE_13 => 'Obrero',
            self::PROFE_14 => 'Arquitecto',
            self::PROFE_15 => 'Abogado',
            self::PROFE_16 => 'Ingeniero',
            self::PROFE_17 => 'Profesor universitario',
            self::PROFE_18 => 'Corredor de bolsa',
            self::PROFE_19 => 'Médico',
            self::PROFE_20 => 'Cirujano',
            self::PROFE_21 => 'Enfermera',
            self::PROFE_22 => 'Dentista',
            self::PROFE_23 => 'Astrónomo',
            self::PROFE_24 => 'Banquero',
            self::PROFE_25 => 'Biólogo',
            self::PROFE_26 => 'Químico',
            self::PROFE_27 => 'Consultor',
            self::PROFE_28 => 'Economista',
            self::PROFE_29 => 'Programador',
            self::PROFE_30 => 'Historiador',
            self::PROFE_31 => 'Periodista',
            self::PROFE_32 => 'Arqueólogo',
            self::PROFE_33 => 'Diseñador',
            self::PROFE_34 => 'Juez',
            self::PROFE_35 => 'Matemático',
            self::PROFE_36 => 'Oftalmólogo',
            self::PROFE_37 => 'Pediatra',
            self::PROFE_38 => 'Filósofo',
            self::PROFE_39 => 'Físico',
            self::PROFE_40 => 'Psiquiatra',
            self::PROFE_41 => 'Psicólogo',
            self::PROFE_42 => 'Psicoterapeuta',
            self::PROFE_43 => 'Reportero',
            self::PROFE_44 => 'Investigador',
            self::PROFE_45 => 'Científico',
            self::PROFE_46 => 'Inspector de impuestos',
            self::PROFE_47 => 'Traductor',
            self::PROFE_48 => 'Escritor',
            self::PROFE_49 => 'Veterinario',
            self::PROFE_50 => 'Maestro',
            self::PROFE_51 => 'Cajero de banco',
            self::PROFE_52 => 'Carnicero',
            self::PROFE_53 => 'Cajero',
            self::PROFE_54 => 'Detective',
            self::PROFE_55 => 'Chófer',
            self::PROFE_56 => 'Empleado',
            self::PROFE_57 => 'Florista',
            self::PROFE_58 => 'Jardinero',
            self::PROFE_59 => 'Joyero',
            self::PROFE_60 => 'Cartero',
            self::PROFE_61 => 'Vendedor',
            self::PROFE_62 => 'Costurera',
            self::PROFE_63 => 'Sastre',
            self::PROFE_64 => 'Camionero',
            self::PROFE_65 => 'Soldado',
            self::PROFE_66 => 'Marinero',
            self::PROFE_67 => 'Piloto',
            self::PROFE_68 => 'Oficial de policía',
            self::PROFE_69 => 'Policía',
            self::PROFE_70 => 'Guardia de seguridad',
            self::PROFE_71 => 'Salvavidas',
            self::PROFE_72 => 'Botones de hotel',
            self::PROFE_73 => 'Chef',
            self::PROFE_74 => 'Azafata',
            self::PROFE_75 => 'Peluquero',
            self::PROFE_76 => 'Ama de llaves',
            self::PROFE_77 => 'Guía de turistas',
            self::PROFE_78 => 'Agente de viajes',
            self::PROFE_79 => 'Mesero',
            self::PROFE_80 => 'Actor',
            self::PROFE_81 => 'Actriz',
            self::PROFE_82 => 'Locutor',
            self::PROFE_83 => 'Artista',
            self::PROFE_84 => 'Camarógrafo',
            self::PROFE_85 => 'Compositor',
            self::PROFE_86 => 'Bailarín',
            self::PROFE_87 => 'Modelo',
            self::PROFE_88 => 'Músico',
            self::PROFE_89 => 'Fotógrafo',
            self::PROFE_90 => 'Pianista',
            self::PROFE_91 => 'Poeta',
            self::PROFE_92 => 'Editor',
            self::PROFE_93 => 'Escultor',
            self::PROFE_94 => 'Cantante',
            self::PROFE_95 => 'Atleta',
            self::PROFE_96 => 'Entrenador',
            self::PROFE_97 => 'Ciclista',
            self::PROFE_98 => 'Futbolista',
            self::PROFE_99 => 'Deportista',
            self::PROFE_100 => 'Vaquero',
            self::PROFE_101 => 'Agricultor',
            self::PROFE_102 => 'Pescador',
            self::PROFE_103 => 'Cazador',
            self::PROFE_104 => 'Pastor',
            self::PROFE_105 => 'Empresario',
            self::PROFE_106 => 'Agente de seguros',
            self::PROFE_107 => 'Gerente',
            self::PROFE_108 => 'Recepcionista',
            self::PROFE_109 => 'Telefonista',
            self::PROFE_110 => 'Astrólogo',
            self::PROFE_111 => 'Torero',
            self::PROFE_112 => 'Caricaturista',
            self::PROFE_113 => 'Adivino',
            self::PROFE_114 => 'Monja',
            self::PROFE_115 => 'Político',
            self::PROFE_116 => 'Presidente',
            self::PROFE_117 => 'Sacerdote',
        ];
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[grado]].
     * 
     * @return string la propiedad [[grado]] como una cadena de texto para su visualizacion.
     */
    public function getTextoGrado()
    {
        $options = $this->getOpcionesGrado();
        return isset($options[$this->grado]) ? $options[$this->grado] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[vivienda]].
     * 
     * @return string la propiedad [[vivienda]] como una cadena de texto para su visualizacion.
     */
    public function getTextoVivienda()
    {
        $options = $this->getOpcionesVivienda();
        return isset($options[$this->vivienda]) ? $options[$this->vivienda] : '';
    }
    
    /**
     * Retorna el valor de texto de la propiedad [[profesion]].
     * 
     * @return string la propiedad [[profesion]] como una cadena de texto para su visualizacion.
     */
    public function getTextoProfesion()
    {
        $options = $this->getOpcionesProfesion();
        return isset($options[$this->profesion]) ? $options[$this->profesion] : '';
    }
}
