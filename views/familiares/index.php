<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FamiliaresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Familiares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familiares-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Datos Familiares', ['create'], ['class' => 'btn btn-success']) ?>
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
            'nombre_madre',
            'nombre_padre',
            'nombre_conyugue',
            'cantidad_hijos',
            // 'sit_padres',
            [
                'header' => 'Situación de Padres',
                // 'options' => ['width' => '10%'],
                'attribute' => 'sit_padres',
                'value' => function ($model){
                                return $model->getSitPadres();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'sit_padres',
                                    $searchModel->getOpcionesSitPadres(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
