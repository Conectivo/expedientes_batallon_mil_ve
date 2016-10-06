<?php

use yii\helpers\Html;
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
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
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
            // 'fecha_ingreso',
            [
                'attribute' => 'fecha_ingreso',
                'label'=>'Fecha de Ingreso',
                // 'format' => ['date', 'php:l, F d, Y']                
                'format' => ['date', 'php:d-m-Y']
            ],
        ],
    ]) ?>

</div>
