<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OficialesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Oficiales';
$this->params['breadcrumbs'][] = ['label' => 'Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficiales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Oficiales',
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
            'nombres',
            'apellidos',
            'cedula',
            [
                'header' => 'Situación',
                'attribute' => 'situacion',
                'value' => function ($model){
                                return $model->getSituacion();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'situacion',
                                    $searchModel->getOpcionesSituacion(),
                                    ['class'=>'form-control', 'prompt' => '--- Seleccioné ---']
                            ),
            ],
            [
                'header' => 'Sexo',
                'attribute' => 'sexo',
                'value' => function ($model){
                                return $model->getSexo();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'sexo',
                                    $searchModel->getOpcionesSexo(),
                                    ['class'=>'form-control', 'prompt' => '--- Seleccioné ---']
                            ),
            ],
            // 'email:email',
            // 'arma',
            // 'cargo',
            // 'direccion',
            // 'telefono',
            // 'direccion_emergencia',
            // 'telefonos_emergencia',

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
