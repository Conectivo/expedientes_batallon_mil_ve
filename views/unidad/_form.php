<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'unidad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
