<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oficiales */

$this->title = $model->getJerarquia() . " ". $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficiales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'jquia',
            [
                'label' => 'Jerarquía',
                'attribute' => 'jquia',
                'value' => $model->getJerarquia(),
            ],
            'nombres',
            'apellido',
            'cedula',
            // 'situacion',
            [
                'label' => 'Situación',
                'attribute' => 'situacion',
                'value' => $model->getSituacion(),
            ],
            // 'email:email',
            [
                'attribute' => 'email',
                'label' => 'Correo electrónico',
                'format' => ['email']
            ],
            'arma',
            'cargo',
            'direccion',
            'telefono',
            'direccion_emergencia',
            'telefonos_emergencia',
        ],
    ]) ?>

</div>
