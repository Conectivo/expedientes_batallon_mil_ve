<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = $model->unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidad de Batallón', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
            Modal::begin([
                'header' => '<b>' . 'Eliminar Unidad de Batallón' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">'.'No'.'</button>'
                    .Html::a('Eliminar',
                        ['delete', 'id' => $model->id],
                        [
                            'class' => 'btn btn-danger',
                            'data' => ['method' => 'post',],
                        ]
                    ),
                'toggleButton' => ['label' => 'Eliminar', 'class' => 'btn btn-danger'],
                'size' => Modal::SIZE_SMALL
            ]);
            echo '¿Está seguro que desea eliminar este elemento?';
            Modal::end();
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            // 'unidad',
            [
                'attribute' => 'unidad',
                'label'=>'Nombre de Unidad',
            ],
        ],
    ]) ?>

</div>
