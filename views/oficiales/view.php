<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Oficiales */

$this->title = $model->jquia->nombre . " ". $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficiales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        echo GhostHtml::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . 'Volver', ['/oficiales/index'], ['class' => 'btn btn-primary btn btn-back']) . '&nbsp;';
        echo GhostHtml::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar',
            ['/oficiales/update', 'id' => $model->id], ['class' => 'btn btn-primary']
        ) . '&nbsp;';

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Eliminar Datos del Oficial' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar',
                        ['/oficiales/delete', 'id' => $model->id],
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
            // 'id',
            [
                'label' => 'Jerarquía',
                'attribute' => 'jquia_id',
                'value' => $model->jquia->nombre,
            ],
            'nombres',
            'apellidos',
            'cedula',
            [
                'label' => 'Sexo',
                'attribute' => 'sexo_id',
                'value' => $model->sexo->nombre,
            ],
            [
                'label' => 'Situación',
                'attribute' => 'situacion',
                'value' => $model->getSituacion(),
            ],
            [
                'attribute' => 'email',
                'label' => 'Correo electrónico',
                'format' => ['email']
            ],
            'arma',
            'cargo',
            'direccion',
            'telefono',
            'direccion_emergencia',
            'telefonos_emergencia',
            [
                'attribute' => 'status',
                'value' => ($model->status == 1) ? '<span class="label label-success">Activo</span>' : '<span class="label label-danger">Inactivo</span>',
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
