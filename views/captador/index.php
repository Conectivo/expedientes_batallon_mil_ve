<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaptadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Captadores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="captador-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Captador', ['create'], ['class' => 'btn btn-success']) ?>
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
            'cedula',
            'nombre_completo',
            'telefono',
            // 'captado',
            [
                'attribute'=>'captado',
                // 'label'=>'Personal Captado',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->captado,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$searchModel->captado],
                        ['title'=>'Ver Datos del Personal' ]);
                },
                'format'=>'raw'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
