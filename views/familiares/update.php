<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Familiares */

$this->title = 'Actualizar Datos Familiares: ' . $model->cedula_id;
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedula_id, 'url' => ['view', 'id' => $model->cedula_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="familiares-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
