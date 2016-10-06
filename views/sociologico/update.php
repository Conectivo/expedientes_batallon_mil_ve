<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sociologico */

$this->title = 'Actualizar Datos Sociológicos: ' . $model->cedula_id;
$this->params['breadcrumbs'][] = ['label' => 'Datos Sociológicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedula_id, 'url' => ['view', 'id' => $model->cedula_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="sociologico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
