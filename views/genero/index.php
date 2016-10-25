<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GeneroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Género';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
if ($searchModel->isNewRecord  && User::hasRole('LlenarRegistros') && User::hasRole('ModificarRegistros')) {
    echo $this->render('/genero/create', ['model' => $model]); 
}

if (!$searchModel->isNewRecord  && !User::hasRole('LlenarRegistros') && User::hasRole('ModificarRegistros')) {
    echo $this->render('/genero/update', ['model' => $model]);
}
?>

<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-th-list"></i> <?= $this->title ?></h3></div>
</div>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
    <div class="genero-index">
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nombre',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-search"></span>',
                            $url, ['title' => 'Ver',]);
                    },
                    'update' => function ($url, $model) {
                        return GhostHtml::a('<span class="glyphicon glyphicon-edit"></span>',
                            $url, ['title' => 'Actualizar',]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key){
                    if ($action === 'view') {
                        return Yii::$app->urlManager->createUrl(['/genero/view', 'id'=>$model->id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/genero/update', 'id'=>$model->id]);
                    }
                }
            ],
        ],
        ]); ?>
        </div>
     </div>
   </div>
</div>
