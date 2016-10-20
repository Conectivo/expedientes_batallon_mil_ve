<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaptadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Captadores';
$this->params['breadcrumbs'][] = ['label' => 'Captadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="captador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Captador',
            ['create'], ['class' => 'btn btn-success']
        ); ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'header' => 'Jerarquía',
                'attribute' => 'jquia_id',
                'value' => function ($model){
                                return $model->jquia->nombre;
                            },
                'filter' => Html::activeDropDownList($searchModel, 'jquia_id',
                                    ArrayHelper::map(app\models\Jerarquia::find()->all(),'id','nombre'),
                                        ['class'=>'form-control','prompt' => '--- Seleccioné ---']
                            ),
            ],
            'cedula',
            'nombre_completo',
            'telefono',
            [
                'attribute'=>'captado',
                // 'label'=>'Personal Captado',
                'value'=>function ($model, $key, $index, $widget) {
                    return Html::a($model->captado0->nombres . " " .$model->captado0->apellidos,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$model->captado],
                        ['title'=>'Ver Datos del Personal' ]);
                },
                'format'=>'raw'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-search"></span>',
                            $url, ['title' => 'Ver',]);
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
