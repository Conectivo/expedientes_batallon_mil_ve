<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
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
        if (User::hasRole('ModificarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar', ['update', 'id' => $model->cedula], ['class' => 'btn btn-primary']);
            echo '&nbsp;';
        }

        if (User::hasRole('EliminarRegistros')) {
            // Fuente: https://github.com/tiberiucontiu/pwts/blob/ffbca430bda250a06761cee6a6f7f1bd42cefc22/views/location/view.php
            Modal::begin([
                'header' => '<b>' . 'Eliminar Datos Básicos de Persona' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('Eliminar',
                        ['delete', 'id' => $model->cedula],
                        [
                            'class' => 'btn btn-danger',
                            'data' => ['method' => 'post',],
                        ]
                    ),
                'toggleButton' => ['label' => '<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar', 'class' => 'btn btn-danger'],
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
            // 'cedula',
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
            // 'lugar_nacimiento',
            [
                'attribute' => 'lugar_nacimiento',
                'label' => 'Lugar de Nacimiento',
            ],
            // 'fecha_nacimiento',
            [
                'attribute' => 'fecha_nacimiento',
                'label' => 'Fecha de Nacimiento',
                // 'format' => ['date', 'php:l, F d, Y']                
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'direccion',
            [
                'attribute' => 'direccion',
                'label' => 'Dirección',
            ],
            // 'sector',
            [
                'attribute' => 'sector',
                'label' => 'Sector',
            ],
            // 'telefono_movil',
            [
                'attribute' => 'telefono_movil',
                'label' => 'Teléfono Celular',
            ],
            // 'religion',
            [
                'attribute' => 'religion',
                'label' => 'Religión',
                'value' => $model->getReligion(),
            ],
            // 'estado_civil',
            [
                'attribute' => 'estado_civil',
                'label' => 'Estado Civil',
                'value' => $model->getEdoCivil(),
            ],
            // 'modalidad',
            [
                'attribute' => 'modalidad',
                'label' => 'Modalidad',
                'value' => $model->getModalidad(),
            ],
            // 'fecha_ingreso',
            [
                'attribute' => 'fecha_ingreso',
                'label' => 'Fecha de Ingreso',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'unidad_id',
            [
                'attribute' => 'unidad_id',
                'label' => 'Unidad de Batallón',
                'value' => Html::a($model->unidad_id,
                        // http://127.0.0.1/unidad/view?id=1
                        ['unidad/view','id' => $model->unidad_id],
                        ['title' => 'Ver Datos del Unidad de Batallón' ]
                ),
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
