<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Crear Oficiales', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
