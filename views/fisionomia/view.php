<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Fisionomia */

$this->title = $model->cedula_id;
$this->params['breadcrumbs'][] = ['label' => 'Fisionomía del Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fisionomia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (User::hasRole('ModificarRegistros')) {
            echo Html::a('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar', ['update', 'id' => $model->cedula_id], ['class' => 'btn btn-primary']);
            echo '&nbsp;';
        }

        if (User::hasRole('EliminarRegistros')) {
            Modal::begin([
                'header' => '<b>' . 'Eliminar Fisionomía del Personal' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">' . '<span class="glyphicon glyphicon-remove"></span> ' . 'No' . '</button>'
                    .Html::a('Eliminar',
                        ['delete', 'id' => $model->cedula_id],
                        [
                            'class' => 'btn btn-danger',
                            'data' => ['method' => 'post',],
                        ]
                    ),
                'toggleButton' => ['label' => '<span class="glyphicon glyphicon-trash"></span> ' . 'Eliminar', 'class' => 'btn btn-danger'],
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
            // 'cedula_id',
            [
                'attribute' => 'cedula_id',
                'label' => 'Persona',
                'value' => Html::a($model->cedula_id,
                        // http://127.0.0.1/persona/view?id=25498875
                        ['persona/view','id'=>$model->cedula_id],
                        ['title'=>'Ver Datos del Personal' ]
                ),
                'format'=>'raw',
            ],          
            // 'color_piel',
            [
                'attribute' => 'color_piel',
                'label' => 'Color de Piel',
            ],
            // 'color_cabello',
            [
                'attribute' => 'color_cabello',
                'label' => 'Color de Cabello',
                'value' => $model->getColorCabello(),
            ],
            // 'color_ojos',
            [
                'attribute' => 'color_ojos',
                'label' => 'Color de Ojos',
                'value' => $model->getColorOjos(),
            ],
            // 'contextura',
            [
                'attribute' => 'contextura',
                'label' => 'Contextura',
            ],
            // 'condicion_fisica',
            [
                'attribute' => 'condicion_fisica',
                'label' => 'Condición Física',
                'value' => $model->getCondicionF(),
            ],
            // 'condicion_intelectual',
            [
                'attribute' => 'condicion_intelectual',
                'label' => 'Condición Intelectual',
                'value' => $model->getCondicionI(),
            ],
            // 'estatura',
            [
                'attribute' => 'estatura',
                'label'=>'Estatura',
                'format' => ['decimal', 2],
            ],
            // 'peso',
            [
                'attribute' => 'peso',
                'label'=>'Peso',
                'format' => ['decimal', 2],
            ],
            // 'grupo_sanguineo',
            [
                'attribute' => 'grupo_sanguineo',
                'label' => 'Grupo Sanguíneo',
                'value' => $model->getGrupoSangre(),
            ],
            // 'senales_particulares',
            [
                'attribute' => 'senales_particulares',
                'label' => 'Señales Particulares',
            ],
        ],
    ]) ?>

</div>
