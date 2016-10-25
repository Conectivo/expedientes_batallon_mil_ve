<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Sociologico */

$this->title = $model->cedula->nombres . " " .$model->cedula->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Datos Sociológicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sociologico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        echo GhostHtml::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar',
            ['update', 'id' => $model->cedula_id], ['class' => 'btn btn-primary']
        ) . '&nbsp;';

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Datos Sociológicos de Persona' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar',
                        ['delete', 'id' => $model->cedula_id],
                        [
                            'class' => 'btn btn-danger',
                            'data' => ['method' => 'post',],
                        ]
                    ),
                'toggleButton' => ['label' => '<span class="glyphicon glyphicon-remove"></span> ' . 'Eliminar', 'class' => 'btn btn-danger'],
                'size' => Modal::SIZE_SMALL
            ]);
            echo '¿Está seguro que desea eliminar este elemento?';
            Modal::end();
        }
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'cedula_id',
                'label' => 'Persona',
                'value' => Html::a($model->cedula->nombres . " " .$model->cedula->apellidos,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$model->cedula_id],
                        ['title'=>'Ver Datos del Personal' ]
                ),
                'format'=>'raw',
            ],
            [
                'attribute' => 'grado',
                'label' => 'Grado de instrucción',
                'value' => $model->getGrado(),
            ],
            [
                'attribute' => 'profesion',
                'label' => 'Profesión',
                'value' => $model->getProfesion(),
            ],
            [
                'attribute' => 'vivienda',
                'label' => '¿Posee Vivienda?',
                'value' => $model->getVivienda(),
            ],
        ],
    ]) ?>

</div>
