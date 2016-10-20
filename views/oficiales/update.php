<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Oficiales */

$this->title = 'Actualizar Oficiales: ' . $model->jquia->nombre . " ". $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jquia->nombre . " ". $model->apellidos, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="oficiales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
