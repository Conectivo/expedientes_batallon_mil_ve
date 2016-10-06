<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SociologicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Sociológicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sociologico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Datos Sociológicos', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'grado',
            [
                'header' => 'Grado de instrucción',
                'attribute' => 'grado',
                'value' => function ($model){
                                return $model->getGrado();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'grado',
                                    $searchModel->getOpcionesGrado(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            'profesion',
            // 'vivienda',
            [
                'header' => '¿Posee Vivienda?',
                'attribute' => 'vivienda',
                'value' => function ($model){
                                return $model->getVivienda();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'vivienda',
                                    $searchModel->getOpcionesVivienda(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
