<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidad de Batallón';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        if (User::hasRole('LlenarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Unidad de Batallón', ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'unidad',
            [
                'attribute' => 'unidad',
                'label'=>'Nombre de Unidad',
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
                        return Yii::$app->urlManager->createUrl(['/unidad/view', 'id'=>$model->id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/unidad/update', 'id'=>$model->id]);
                    }

                    if ($action === 'delete') {
                        return Yii::$app->urlManager->createUrl(['/unidad/delete', 'id'=>$model->id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
