<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidad de Batallón';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Unidad de Batallón', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
