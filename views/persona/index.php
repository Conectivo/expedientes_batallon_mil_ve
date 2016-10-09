<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Crear Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cedula',
            'nombres',
            'apellidos',
            'lugar_nacimiento',
            // 'fecha_nacimiento',
            [
                'attribute' => 'fecha_nacimiento',
                'label'=>'Fecha de Nacimiento',
                // 'format' => ['date', 'php:l, F d, Y']                
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'direccion',
            // 'sector',
            // 'telefono_movil',
            // 'religion',
            [
                'header' => 'Religión',
                'attribute' => 'religion',
                'value' => function ($model){
                                return $model->getReligion();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'religion',
                                    $searchModel->getOpcionesReligion(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'estado_civil',
            [
                'header' => 'Estado Civil',
                'attribute' => 'estado_civil',
                'value' => function ($model){
                                return $model->getEdoCivil();
                            },
                'filter' => Html::activeDropDownList($searchModel, 'estado_civil',
                                    $searchModel->getOpcionesEdoCivil(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'modalidad',
            [
                'header' => 'Modalidad',
                'attribute' => 'modalidad',
                'value' => function ($model){
                                return $model->getModalidad();
                                // if ($model->modalidad == 'C') {
                                //     return $model->getTextoModalidad();
                                // } else {
                                //     return $model->getTextoModalidad();
                                // }
                            },
                'filter' => Html::activeDropDownList($searchModel, 'modalidad',
                                    $searchModel->getOpcionesModalidad(),
                                    ['class'=>'form-control', 'prompt' => 'Seleccioné una opción']
                            ),
            ],
            // 'fecha_ingreso',
            [
                'attribute' => 'fecha_ingreso',
                'label'=>'Fecha de Ingreso',
                // 'format' => ['date', 'php:l, F d, Y']
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'unidad_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
