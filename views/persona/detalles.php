<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\components\GhostHtml;

/* @var $this yii\web\View */
/* @var $modelPersona app\models\Persona */
/* @var $modelFamiliares app\models\Familiares */
/* @var $modelSociologico app\models\Sociologico */
/* @var $modelFisionomia app\models\Fisionomia */
/* @var $modelUniforme app\models\Uniforme */
/* @var $modelCaptador app\models\Captador */

$this->title = $modelPersona->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><span class="glyphicon glyphicon-user"></span> Ficha General del Personal <?php Html::encode($this->title) ?></h1>


    <p>
        <?php
        echo GhostHtml::a('<span class="glyphicon glyphicon-list"></span> ' . 'Vovler al Listado de Personal',
            ['index'], ['class' => 'btn btn-primary']
        );
        ?>
    </p>

    <h2><span class="glyphicon glyphicon-certificate"></span> Datos Basicos</h2>
    <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $modelPersona,
        'attributes' => [
            [
                'attribute' => 'cedula',
                'label' => 'Cédula',
            ],
            [
                'attribute' => 'fullName',
                'label' => 'Nombre completo',
                'value' => $modelPersona->fullName,
            ],
            [
                'attribute' => 'lugar_nacimiento',
                'label' => 'Lugar de Nacimiento',
            ],
            [
                'attribute' => 'fecha_nacimiento',
                'label' => 'Fecha de Nacimiento',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'direccion',
                'label' => 'Dirección',
            ],
            [
                'attribute' => 'sector',
                'label' => 'Sector',
            ],
            [
                'attribute' => 'telefono_movil',
                'label' => 'Teléfono Celular',
            ],
            [
                'attribute' => 'religion',
                'label' => 'Religión',
                'value' => $modelPersona->getReligion(),
            ],
            [
                'attribute' => 'estado_civil',
                'label' => 'Estado Civil',
                'value' => $modelPersona->getEdoCivil(),
            ],
            [
                'attribute' => 'modalidad',
                'label' => 'Modalidad',
                'value' => $modelPersona->getModalidad(),
            ],
            [
                'attribute' => 'fecha_ingreso',
                'label'=>'Fecha de Ingreso',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'unidad_id',
                'label' => 'Unidad de Batallón',
                // 'value' => Html::a($modelPersona->unidad->unidad,
                //         // http://127.0.0.1/unidad/view?id=1
                //         ['unidad/view','id' => $modelPersona->unidad_id],
                //         ['title' => 'Ver Datos del Unidad de Batallón' ]
                // ),
                'value' => $modelPersona->unidad->unidad,
                // 'format' => 'raw',
            ],
        ],
    ]) ?>
    </div>

    <h2><span class="glyphicon glyphicon-info-sign"></span> Datos Familiares</h2>

    <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $modelFamiliares,
        'attributes' => [
            [
                'attribute' => 'nombre_madre',
                'label' => 'Nombre de la Madre',
            ],
            [
                'attribute' => 'nombre_padre',
                'label' => 'Nombre del Padre',
            ],
            [
                'attribute' => 'nombre_conyugue',
                'label' => 'Nombre del Cónyuge',
            ],
            [
                'attribute' => 'cantidad_hijos',
                'label' => 'Cantidad de Hijos',
            ],
            [
                'attribute' => 'sit_padres',
                'label' => 'Situación de los Padres',
                'value' => $modelFamiliares->getSitPadres(),
            ],
        ],
    ]) ?>
    </div>

    <h2><span class="glyphicon glyphicon-education"></span> Datos Sociológicos</h2>

    <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $modelSociologico,
        'attributes' => [
            [
                'attribute' => 'grado',
                'label' => 'Grado de instrucción',
                'value' => $modelSociologico->getGrado(),
            ],
            [
                'attribute' => 'profesion',
                'label' => 'Profesión',
                'value' => $modelSociologico->getProfesion(),
            ],
            [
                'attribute' => 'vivienda',
                'label' => '¿Posee Vivienda?',
                'value' => $modelSociologico->getVivienda(),
            ],
        ],
    ]) ?>
    </div>

    <h2><span class="glyphicon glyphicon-scale"></span> Fisionomía del Personal</h2>

    <div class="col-md-6">

    <?= DetailView::widget([
        'model' => $modelFisionomia,
        'attributes' => [
            [
                'attribute' => 'color_piel',
                'label' => 'Color de Piel',
            ],
            [
                'attribute' => 'color_cabello',
                'label' => 'Color de Cabello',
                'value' => $modelFisionomia->getColorCabello(),
            ],
            [
                'attribute' => 'color_ojos',
                'label' => 'Color de Ojos',
                'value' => $modelFisionomia->getColorOjos(),
            ],
            [
                'attribute' => 'contextura',
                'label' => 'Contextura',
            ],
            [
                'attribute' => 'condicion_fisica',
                'label' => 'Condición Física',
                'value' => $modelFisionomia->getCondicionF(),
            ],
            [
                'attribute' => 'condicion_intelectual',
                'label' => 'Condición Intelectual',
                'value' => $modelFisionomia->getCondicionI(),
            ],
            [
                'attribute' => 'estatura',
                'label'=>'Estatura',
                'format' => ['decimal', 2],
            ],
            [
                'attribute' => 'peso',
                'label'=>'Peso',
                'format' => ['decimal', 2],
            ],
            [
                'attribute' => 'grupo_sanguineo',
                'label' => 'Grupo Sanguíneo',
                'value' => $modelFisionomia->getGrupoSangre(),
            ],
            [
                'attribute' => 'senales_particulares',
                'label' => 'Señales Particulares',
            ],
        ],
    ]) ?>
    </div>

    <h2><span class="glyphicon glyphicon-briefcase"></span> Uniforme del Personal</h2>

    <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $modelUniforme,
        'attributes' => [
            [
                'label' => 'Tallas',
                'attribute' => 'tipo_talla',
                'value' => $modelUniforme->getTalla(),
            ],
            'gorra',
            'calzado',
        ],
    ]) ?>
    </div>

    <h2><span class="glyphicon glyphicon-briefcase"></span> Captador del Personal</h2>

    <div class="col-md-6">
    <?= DetailView::widget([
        'model' => $modelCaptador,
        'attributes' => [
            //'id',
            [
                'label' => 'Jerarquía',
                'attribute' => 'jquia_id',
                'value' => $modelCaptador->jquia->nombre,
            ],
            'cedula',
            'nombre_completo',
            'telefono',
        ],
    ]) ?>
    </div>

</div>
