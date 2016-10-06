<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'unidad')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'fecha_ingreso')->textInput() ?>
    <?= $form->field($model,'fecha_ingreso')->
        widget(DatePicker::className(),[
            'dateFormat' => 'yyyy-MM-dd',
            'language' => 'es',
            'readonly' => true,
            'clientOptions' => [
                'yearRange' => '-115:+0',
                'changeYear' => true],
                'options' => ['class' => 'form-control']
        ])->label('Fecha de Ingreso') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
