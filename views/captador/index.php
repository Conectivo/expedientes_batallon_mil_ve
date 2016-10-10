<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaptadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Captadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="captador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if (User::hasRole('LlenarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Captador', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'jquia',
            [
                'header' => 'Jerarquía',
                'attribute' => 'jquia',
                'value' => function ($model){
                                return $model->getJerarquia();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'jquia',
                                    $searchModel->getOpcionesJquia(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            'cedula',
            'nombre_completo',
            'telefono',
            // 'captado',
            [
                'attribute'=>'captado',
                // 'label'=>'Personal Captado',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->captado,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$searchModel->captado],
                        ['title'=>'Ver Datos del Personal' ]);
                },
                'format'=>'raw'
            ],

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return (User::hasRole('ConsultarRegistros')) ?
                            Html::a(
                                '<span class="glyphicon glyphicon-eye-open"></span>',
                                $url, ['title' => 'Ver',]
                            ) : '';
                    },
                    'update' => function ($url, $model) {
                        return (User::hasRole('ModificarRegistros')) ?
                            Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => 'Actualizar',
                                ]) : '';
                    },
                    'delete' => function ($url, $model) {
                        return (User::hasRole('EliminarRegistros')) ?
                            Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                                'title' => 'Eliminar',
                                'data-confirm' => '¿Está seguro que desea eliminar este elemento?',
                                'toggleButton' => ['label' => 'Eliminar', 'class' => 'btn btn-danger'],
                                ]) : '';
                    },
                ],
                'urlCreator' => function ($action, $model, $key){
                    if ($action === 'view') {
                        return Yii::$app->urlManager->createUrl(['/captador/view', 'id'=>$model->id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/captador/update', 'id'=>$model->id]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/captador/delete', 'id'=>$model->id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
