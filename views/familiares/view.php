<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Familiares */

$this->title = $model->cedula_id;
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familiares-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (User::hasRole('ModificarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar', ['update', 'id' => $model->cedula_id], ['class' => 'btn btn-primary']);
            echo '&nbsp;';
        }

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Eliminar Datos Familiares de Persona' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('Eliminar',
                        ['delete', 'id' => $model->cedula_id],
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
            // 'cedula_id',
            [
                'attribute' => 'cedula_id',
                'label' => 'Persona',
                'value' => Html::a($model->cedula_id,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id' => $model->cedula_id],
                        ['title' => 'Ver Datos del Personal' ]
                ),
                'format' => 'raw',
            ],
            // 'nombre_madre',
            [
                'attribute' => 'nombre_madre',
                'label' => 'Nombre de la Madre',
            ],
            // 'nombre_padre',
            [
                'attribute' => 'nombre_padre',
                'label' => 'Nombre del Padre',
            ],
            // 'nombre_conyugue',
            [
                'attribute' => 'nombre_conyugue',
                'label' => 'Nombre del Cónyuge',
            ],
            // 'cantidad_hijos',
            [
                'attribute' => 'cantidad_hijos',
                'label' => 'Cantidad de Hijos',
            ],
            // 'sit_padres',
            [
                'attribute' => 'sit_padres',
                'label' => 'Situación de los Padres',
                'value' => $model->getSitPadres(),
            ],
        ],
    ]) ?>

</div>
