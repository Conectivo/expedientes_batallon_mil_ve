<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UniformeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uniforme del Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uniforme-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Uniforme del Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'cedula_id',
            [
                'attribute'=>'cedula_id',
                'label'=>'Persona',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->cedula_id,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$searchModel->cedula_id],
                        ['title'=>'Ver Datos del Personal' ]);
                },
                'format'=>'raw'
            ],
            // 'tipo_talla',
            [
                'header' => 'Tallas',
                'attribute' => 'tipo_talla',
                'value' => function ($model){
                                if ($model->tipo_talla == 'XXS') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'XS') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'S') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'M') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'L') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'XL') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'XXL') {
                                    return $model->getTextoTallas();
                                } elseif ($model->tipo_talla == 'XXL') {
                                    return $model->getTextoTallas();
                                } else {
                                    return $model->getTextoTallas();
                                }
                            },
                'filter' => Html::activeDropDownList($searchModel, 'tipo_talla',
                                    $searchModel->getOpcionesTallas(),
                                    ['class'=>'form-control', 'prompt' => 'Para filtrar, seleccioné una opción']
                            ),
            ],
            'gorra',
            'calzado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
