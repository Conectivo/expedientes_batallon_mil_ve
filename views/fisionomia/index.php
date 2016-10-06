<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FisionomiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fisionomía del Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fisionomia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Fisionomía del Personal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'cedula_id',
            [
                'attribute'=>'cedula_id',
                'label'=>'Persona',
                'value'=>function ($searchModel, $key, $index, $widget) {
                    return Html::a($searchModel->cedula_id,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$searchModel->cedula_id],
                        ['title'=>'Ver Datos del Personal' ]);
                },
                'format'=>'raw'
            ],
            'color_piel',
            // 'color_cabello',
            [
                'header' => 'Color Cabello',
                'attribute' => 'color_cabello',
                'value' => function ($model){
                                return $model->getColorCabello();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'color_cabello',
                                    $searchModel->getOpcionesColorCabello(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'color_ojos',
            [
                'header' => 'Color Ojos',
                'attribute' => 'color_ojos',
                'value' => function ($model){
                                return $model->getColorOjos();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'color_ojos',
                                    $searchModel->getOpcionesColorOjos(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            'contextura',
            // 'condicion_fisica',
            [
                'header' => 'Cond. Física',
                'attribute' => 'condicion_fisica',
                'value' => function ($model){
                                return $model->getCondicionF();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'condicion_fisica',
                                    $searchModel->getOpcionesCondicion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'condicion_intelectual',
            [
                'header' => 'Cond. Intelectual',
                'attribute' => 'condicion_intelectual',
                'value' => function ($model){
                                return $model->getCondicionI();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'condicion_intelectual',
                                    $searchModel->getOpcionesCondicion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'estatura',
            // 'peso',
            // 'grupo_sanguineo',
            [
                'header' => 'Tipo Sangre',
                'attribute' => 'grupo_sanguineo',
                'value' => function ($model){
                                return $model->getGrupoSangre();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'grupo_sanguineo',
                                    $searchModel->getOpcionesGrupoSangre(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné']
                            ),
            ],
            // 'senales_particulares',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
