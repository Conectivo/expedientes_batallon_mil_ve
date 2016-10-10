<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FisionomiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fisionomía del Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fisionomia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if (User::hasRole('LlenarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Fisionomía del Personal', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
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
            'color_piel',
            // 'color_cabello',
            [
                'header' => 'Color Cabello',
                'attribute' => 'color_cabello',
                'value' => function ($model){
                                return $model->getColorCabello();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'color_cabello',
                                    $searchModel->getOpcionesColorCabello(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'color_ojos',
            [
                'header' => 'Color Ojos',
                'attribute' => 'color_ojos',
                'value' => function ($model){
                                return $model->getColorOjos();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'color_ojos',
                                    $searchModel->getOpcionesColorOjos(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            'contextura',
            // 'condicion_fisica',
            [
                'header' => 'Cond. Física',
                'attribute' => 'condicion_fisica',
                'value' => function ($model){
                                return $model->getCondicionF();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'condicion_fisica',
                                    $searchModel->getOpcionesCondicion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'condicion_intelectual',
            [
                'header' => 'Cond. Intelectual',
                'attribute' => 'condicion_intelectual',
                'value' => function ($model){
                                return $model->getCondicionI();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'condicion_intelectual',
                                    $searchModel->getOpcionesCondicion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'estatura',
            // 'peso',
            // 'grupo_sanguineo',
            [
                'header' => 'Tipo Sangre',
                'attribute' => 'grupo_sanguineo',
                'value' => function ($model){
                                return $model->getGrupoSangre();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'grupo_sanguineo',
                                    $searchModel->getOpcionesGrupoSangre(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'senales_particulares',

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
                        return Yii::$app->urlManager->createUrl(['/fisionomia/view', 'id'=>$model->cedula_id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/fisionomia/update', 'id'=>$model->cedula_id]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/fisionomia/delete', 'id'=>$model->cedula_id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
