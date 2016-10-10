<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OficialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oficiales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficiales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if (User::hasRole('LlenarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Oficiales', ['create'], ['class' => 'btn btn-success']);
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
            'nombres',
            'apellido',
            'cedula',
            //'situacion',
            [
                'header' => 'Situación',
                'attribute' => 'situacion',
                'value' => function ($model){
                                return $model->getSituacion();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'situacion',
                                    $searchModel->getOpcionesSituacion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'email:email',
            // 'arma',
            // 'cargo',
            // 'direccion',
            // 'telefono',
            // 'direccion_emergencia',
            // 'telefonos_emergencia',

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
                        return Yii::$app->urlManager->createUrl(['/oficiales/view', 'id'=>$model->id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/oficiales/update', 'id'=>$model->id]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/oficiales/delete', 'id'=>$model->id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
