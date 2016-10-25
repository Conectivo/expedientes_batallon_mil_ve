<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Genero */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Género', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-view">

    <h3 class="box-title"><i class="fa fa-search"></i> <?php echo 'Ver Género del Personal / Oficial'; ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
        ],
    ]) ?>

    <p>
        <?php
        echo GhostHtml::a('<span class="glyphicon glyphicon-arrow-left"></span> ' . 'Volver', ['/genero/index'], ['class' => 'btn btn-primary btn btn-back']) . '&nbsp;';
        echo GhostHtml::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar',
            ['/genero/update', 'id' => $model->id], ['class' => 'btn btn-primary']
        ) . '&nbsp;';

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Eliminar Unidad de Batallón' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar',
                        ['/genero/delete', 'id' => $model->id],
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
