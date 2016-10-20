<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CaptadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="captador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jquia_id') ?>

    <?= $form->field($model, 'cedula') ?>

    <?= $form->field($model, 'nombre_completo') ?>

    <?= $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'captado') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
