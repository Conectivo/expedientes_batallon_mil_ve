<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uniforme */

$this->title = 'Actualizar Uniforme de ' . $model->cedula->nombres . " " .$model->cedula->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Uniforme del Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedula->nombres . " " .$model->cedula->apellidos, 'url' => ['view', 'id' => $model->cedula_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="uniforme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
