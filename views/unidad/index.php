<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unidad de Batallón';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
if ($searchModel->isNewRecord  && User::hasRole('LlenarRegistros') && User::hasRole('ModificarRegistros')) {
    echo $this->render('/unidad/create', ['model' => $model]); 
}

if (!$searchModel->isNewRecord  && !User::hasRole('LlenarRegistros') && User::hasRole('ModificarRegistros')) {
    echo $this->render('/unidad/update', ['model' => $model]);
}
?>

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
    <div class="unidad-index">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'nombre',
                'label'=>'Nombre de Unidad',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                //'template' => '{view} {update} {delete}',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        // return (User::hasRole('ConsultarRegistros')) ?
                        //     Html::a(
                        //         '<span class="glyphicon glyphicon-eye-open"></span>',
                        //         $url, ['title' => 'Ver',]
                        //     ) : '';
                        return GhostHtml::a('<span class="glyphicon glyphicon-search"></span>',
                            $url, ['title' => 'Ver',]);
                    },
                    'update' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-edit"></span>',
                            $url, ['title' => 'Actualizar',]);
                    },
                    // 'delete' => function ($url, $model) {
                    //     return GhostHtml::a('<span class="glyphicon glyphicon-remove"></span>', $url, [
                    //         'title' => 'Eliminar',
                    //         'data-confirm' => '¿Está seguro que desea eliminar este elemento?',
                    //         'toggleButton' => ['label' => 'Eliminar', 'class' => 'btn btn-danger'],
                    //     ]);
                    // },
                ],
                'urlCreator' => function ($action, $model, $key){
                    if ($action === 'view') {
                        return Yii::$app->urlManager->createUrl(['/unidad/view', 'id'=>$model->id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/unidad/update', 'id'=>$model->id]);
                    }

                    // if ($action === 'delete') {
                    //     return Yii::$app->urlManager->createUrl(['/unidad/delete', 'id'=>$model->id]);
                    // }
                }
            ],
        ],
        ]); ?>
        </div>
     </div>
   </div>
</div>
