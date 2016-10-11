<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Persona',
            ['create'], ['class' => 'btn btn-success']
        ); ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cedula',
            'nombres',
            'apellidos',
            'lugar_nacimiento',
            // 'fecha_nacimiento',
            [
                'attribute' => 'fecha_nacimiento',
                'label'=>'Fecha de Nacimiento',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'direccion',
            // 'sector',
            // 'telefono_movil',
            // 'religion',
            [
                'header' => 'Religión',
                'attribute' => 'religion',
                'value' => function ($model){
                                return $model->getReligion();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'religion',
                                    $searchModel->getOpcionesReligion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'estado_civil',
            [
                'header' => 'Estado Civil',
                'attribute' => 'estado_civil',
                'value' => function ($model){
                                return $model->getEdoCivil();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'estado_civil',
                                    $searchModel->getOpcionesEdoCivil(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'modalidad',
            [
                'header' => 'Modalidad',
                'attribute' => 'modalidad',
                'value' => function ($model){
                                return $model->getModalidad();
                                // if ($model->modalidad == 'C') {
                                //     return $model->getTextoModalidad();
                                // } else {
                                //     return $model->getTextoModalidad();
                                // }
                            },
                'filter' => Html::activeDropDownList($searchModel, 'modalidad',
                                    $searchModel->getOpcionesModalidad(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'fecha_ingreso',
            [
                'attribute' => 'fecha_ingreso',
                'label'=>'Fecha de Ingreso',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'unidad_id',

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
                        return Yii::$app->urlManager->createUrl(['/persona/view', 'id'=>$model->cedula]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/persona/update', 'id'=>$model->cedula]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/persona/delete', 'id'=>$model->cedula]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
