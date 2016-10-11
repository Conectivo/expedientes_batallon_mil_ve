<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

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
        <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Datos Sociológicos',
            ['create'], ['class' => 'btn btn-success']
        ); ?>
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
            // 'profesion',
            [
                'header' => 'Grado de instrucción',
                'attribute' => 'profesion',
                'value' => function ($model){
                                return $model->getProfesion();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'profesion',
                                    $searchModel->getOpcionesProfesion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            $url, ['title' => 'Ver',]);
                    },
                    'update' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-pencil"></span>',
                            $url, ['title' => 'Actualizar',]);
                    },
                    'delete' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                            'title' => 'Eliminar',
                            'data-confirm' => '¿Está seguro que desea eliminar este elemento?',
                            'toggleButton' => ['label' => 'Eliminar', 'class' => 'btn btn-danger'],
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key){
                    if ($action === 'view') {
                        return Yii::$app->urlManager->createUrl(['/sociologico/view', 'id'=>$model->cedula_id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/sociologico/update', 'id'=>$model->cedula_id]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/sociologico/delete', 'id'=>$model->cedula_id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
