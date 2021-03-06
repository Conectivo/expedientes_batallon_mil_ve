<?php

use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

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
            // 'nombres',
            'apellidos',
            [
                'header' => 'Sexo',
                'attribute' => 'sexo_id',
                'value' => function ($model){
                                return $model->sexo->nombre;
                            },
                'filter' => Html::activeDropDownList($searchModel, 'sexo_id',
                                    ArrayHelper::map(app\models\Genero::find()->all(),'id','nombre'),
                                    ['class' => 'form-control', 'prompt' => '--- Seleccioné ---']
                            ),
            ],
            [
                'attribute' => 'estado_id',
                'header'=>'Estado',
                'value' => function ($model) {
                                return $model->estado->estado;
                            },
                'filter' => Html::activeDropDownList($searchModel, 'estado_id',
                                    ArrayHelper::map(app\models\Estados::find()->orderBy('estado')->all(), 'id_estado', 'estado'),
                                    ['class'=>'form-control', 'prompt' => '--Seleccione--']
                            ),
            ],
            // [
            //     'attribute' => 'municipio_id',
            //     'header'=>'Municipio',
            //     'value' => function ($model) {
            //                     return $model->municipio->municipio;
            //                 },
            //     'filter' => Html::activeDropDownList($searchModel, 'municipio_id',
            //                         ArrayHelper::map(app\models\Municipios::find()->orderBy('municipio')->all(), 'id_municipio', 'municipio'),
            //                         ['class'=>'form-control', 'prompt' => '--Seleccione--']
            //                 ),
            // ],
            // [
            //     'attribute' => 'parroquia_id',
            //     'header'=>'Parroquia',
            //     'value' => function ($model) {
            //                     return $model->parroquia->parroquia;
            //                 },
            //     'filter' => Html::activeDropDownList($searchModel, 'parroquia_id',
            //                         ArrayHelper::map(app\models\Parroquias::find()->orderBy('parroquia')->all(), 'id_parroquia', 'parroquia'),
            //                         ['class'=>'form-control', 'prompt' => '--Seleccione--']
            //                 ),
            // ],
            // [
            //     'attribute' => 'lugar_nacimiento',
            //     'header'=>'Ciudad de nacimiento',
            //     'value' => function ($model) {
            //                     return $model->lugarNacimiento->ciudad;
            //                 },
            //     'filter' => Html::activeDropDownList($searchModel, 'lugar_nacimiento',
            //                         ArrayHelper::map(app\models\Ciudades::find()->orderBy('ciudad')->all(), 'id_ciudad', 'ciudad'),
            //                         ['class'=>'form-control', 'prompt' => '--Seleccione--']
            //                 ),
            // ],
            // [
            //     'attribute' => 'fecha_nacimiento',
            //     'label'=>'Fecha de Nacimiento',
            //     // 'format' => ['date', 'php:l, F d, Y']
            //     'format' => ['date', 'php:d-m-Y']
            // ],
            // 'direccion',
            // 'sector',
            // 'telefono_movil',
            [
                'header' => 'Religión',
                'attribute' => 'religion',
                'value' => function ($model) {
                                return $model->getReligion();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'religion',
                                    $searchModel->getOpcionesReligion(),
                                    ['class'=>'form-control', 'prompt' => '--Seleccione--']
                            ),
            ],
            [
                'header' => 'Estado Civil',
                'attribute' => 'estado_civil',
                'value' => function ($model) {
                                return $model->getEdoCivil();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'estado_civil',
                                    $searchModel->getOpcionesEdoCivil(),
                                    ['class'=>'form-control', 'prompt' => '--Seleccione--']
                            ),
            ],
            [
                'header' => 'Modalidad',
                'attribute' => 'modalidad',
                'value' => function ($model) {
                                return $model->getModalidad();
                                // if ($model->modalidad == 'C') {
                                //     return $model->getTextoModalidad();
                                // } else {
                                //     return $model->getTextoModalidad();
                                // }
                            },
                'filter' => Html::activeDropDownList($searchModel, 'modalidad',
                                    $searchModel->getOpcionesModalidad(),
                                    ['class'=>'form-control', 'prompt' => '--Seleccione--']
                            ),
            ],
            // [
            //     'attribute' => 'fecha_ingreso',
            //     'label'=>'Fecha de Ingreso',
            //     'format' => ['date', 'php:d-m-Y']
            // ],
            // 'unidad_id',
            // 'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {detalles} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-search"></span>',
                            $url, ['title' => 'Ver',]);
                    },
                    'detalles' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-book"></span>',
                            $url, ['title' => 'Ficha General del Personal',]);
                    },
                    'update' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-edit"></span>',
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

                    if ($action === 'detalles') {
                        return Yii::$app->urlManager->createUrl(['/persona/detalles', 'id'=>$model->cedula]);
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
