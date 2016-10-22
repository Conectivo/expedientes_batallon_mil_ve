<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        echo GhostHtml::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar',
            ['update', 'id' => $model->cedula], ['class' => 'btn btn-primary']
        ) . '&nbsp;';

        if (User::hasRole('EliminarRegistros')) {
            // Fuente: https://github.com/tiberiucontiu/pwts/blob/ffbca430bda250a06761cee6a6f7f1bd42cefc22/views/location/view.php
            Modal::begin([
                'header' => '<b>' . 'Eliminar Datos Básicos de Persona' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar',
                        ['delete', 'id' => $model->cedula],
                        [
                            'class' => 'btn btn-danger',
                            'data' => ['method' => 'post',],
                        ]
                    ),
                'toggleButton' => ['label' => '<span class="glyphicon glyphicon-remove"></span> ' . 'Eliminar', 'class' => 'btn btn-danger'],
                'size' => Modal::SIZE_SMALL
            ]);
            echo '¿Está seguro que desea eliminar este elemento?';
            Modal::end();
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'cedula',
                'label' => 'Cédula',
            ],
            // 'nombres',
            // 'apellidos',
            [
                'attribute' => 'fullName',
                'label' => 'Nombre completo',
                'value' => $model->fullName,
            ],
            [
                'attribute' => 'estado_id',
                // 'label' => 'Estado',
                'value' => $model->estado->estado,
            ],
            [
                'attribute' => 'municipio_id',
                // 'label' => 'Municipio',
                'value' => $model->municipio->municipio,
            ],
            [
                'attribute' => 'parroquia_id',
                // 'label' => 'Parroquia',
                'value' => $model->parroquia->parroquia,
            ],
            [
                'attribute' => 'lugar_nacimiento',
                'label' => 'Ciudad (Lugar de nacimiento)',
                'value' => $model->lugarNacimiento->ciudad,
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
                'value' => $model->getReligion(),
            ],
            [
                'attribute' => 'estado_civil',
                'label' => 'Estado Civil',
                'value' => $model->getEdoCivil(),
            ],
            [
                'attribute' => 'modalidad',
                'label' => 'Modalidad',
                'value' => $model->getModalidad(),
            ],
            [
                'attribute' => 'fecha_ingreso',
                'label' => 'Fecha de Ingreso',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'unidad_id',
                'label' => 'Unidad de Batallón',
                'value' => Html::a($model->unidad->unidad,
                        // http://127.0.0.1/unidad/view?id=1
                        ['unidad/view','id' => $model->unidad_id],
                        ['title' => 'Ver Datos del Unidad de Batallón' ]
                ),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
