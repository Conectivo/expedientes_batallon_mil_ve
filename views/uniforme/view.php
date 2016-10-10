<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Uniforme */

$this->title = $model->cedula_id;
$this->params['breadcrumbs'][] = ['label' => 'Uniforme del Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uniforme-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->cedula_id], ['class' => 'btn btn-primary']) ?>
        <?php
            Modal::begin([
                'header' => '<b>' . 'Eliminar Uniforme del Personal' . '</b>',
                'footer' =>
                    '<button type="button" class="btn btn-success" data-dismiss="modal">'.'No'.'</button>'
                    .Html::a('Eliminar',
                        ['delete', 'id' => $model->cedula_id],
                        [
                            'class' => 'btn btn-danger',
                            'data' => ['method' => 'post',],
                        ]
                    ),
                'toggleButton' => ['label' => 'Eliminar', 'class' => 'btn btn-danger'],
                'size' => Modal::SIZE_SMALL
            ]);
            echo '¿Está seguro que desea eliminar este elemento?';
            Modal::end();
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
            // 'tipo_talla',
            [
                'label' => 'Tallas',
                'attribute' => 'tipo_talla',
                'value' => $model->getTalla(),
            ],
            'gorra',
            'calzado',
        ],
    ]) ?>

</div>
