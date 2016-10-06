<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = 'Actualizar Unidad: ' . $model->unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidad de Batallón', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unidad, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="unidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
