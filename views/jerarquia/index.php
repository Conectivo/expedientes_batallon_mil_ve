<?php

use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JerarquiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jerarquías';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
if ($searchModel->isNewRecord  && User::hasRole('LlenarRegistros') && User::hasRole('ModificarRegistros')) {
    echo $this->render('/jerarquia/create', ['model' => $model]); 
}

if (!$searchModel->isNewRecord  && !User::hasRole('LlenarRegistros') && User::hasRole('ModificarRegistros')) {
    echo $this->render('/jerarquia/update', ['model' => $model]);
}
?>

<div class="col-xs-12" style="padding-top: 10px;">
   <div class="box">
      <div class="box-body table-responsive">
    <div class="jerarquia-index">
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
                        return Yii::$app->urlManager->createUrl(['/jerarquia/view', 'id'=>$model->id]);
                    }

                    if ($action === 'update') {
                        return Yii::$app->urlManager->createUrl(['/jerarquia/update', 'id'=>$model->id]);
                    }
                }
            ],
        ],
        ]); ?>
        </div>
     </div>
   </div>
</div>
