<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = $model->unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidad de Batallón', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-view">

    <h3 class="box-title"><i class="fa fa-search"></i> <?php echo 'Ver Unidad de Batallón'; ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'unidad',
                'label'=>'Nombre de Unidad',
            ],
        ],
    ]) ?>

    <p>
        <?php
        // if (User::hasRole('ModificarRegistros')) {
        //     echo Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        //     echo '&nbsp;';
        // }

        echo GhostHtml::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . 'Volver', ['/unidad/index'], ['class' => 'btn btn-primary btn btn-back']) . '&nbsp;';
        echo GhostHtml::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar',
            ['update', 'id' => $model->id], ['class' => 'btn btn-primary']
        ) . '&nbsp;';

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Eliminar Unidad de Batallón' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar',
                        ['delete', 'id' => $model->id],
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

</div>
