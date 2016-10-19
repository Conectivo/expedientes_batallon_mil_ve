<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

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
        <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Datos Familiares',
            ['create'], ['class' => 'btn btn-success']
        ); ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'cedula_id',
                'label'=>'Persona',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->cedula->nombres . " " .$searchModel->cedula->apellidos,
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
                        return Yii::$app->urlManager->createUrl(['/familiares/view', 'id'=>$model->cedula_id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/familiares/update', 'id'=>$model->cedula_id]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/familiares/delete', 'id'=>$model->cedula_id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
