<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SociologicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sociologico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'grado') ?>

    <?= $form->field($model, 'profesion') ?>

    <?= $form->field($model, 'vivienda') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
