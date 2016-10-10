<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Oficiales */

$this->title = $model->getJerarquia() . " ". $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficiales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (User::hasRole('ModificarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo '&nbsp;';
        }

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Eliminar Datos del Oficial' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('Eliminar',
                        ['delete', 'id' => $model->id],
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
            // 'id',
            // 'jquia',
            [
                'label' => 'Jerarquía',
                'attribute' => 'jquia',
                'value' => $model->getJerarquia(),
            ],
            'nombres',
            'apellido',
            'cedula',
            // 'situacion',
            [
                'label' => 'Situación',
                'attribute' => 'situacion',
                'value' => $model->getSituacion(),
            ],
            // 'email:email',
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
        ],
    ]) ?>

</div>
