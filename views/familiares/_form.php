<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Familiares */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="familiares-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'cedula_id')->textInput() ?>
    <?php /* $form->field($model, 'cedula_id')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'cedula','fullName'),
            ['prompt'=>'Por favor, seleccioné una opción']
    )->label('Persona') */ ?> 
    <?= $form->field($model, 'cedula_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->all(),'cedula','fullName'), 
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Persona'); ?>

    <?= $form->field($model, 'nombre_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_conyugue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad_hijos')->textInput() ?>
    
    <?php /* $form->field($model, 'sit_padres')->dropDownList(
        ['V'=>'Vivos', 'M'=>'Muertos'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Situacion de padres'); */ ?>
    <?= $form->field($model, 'sit_padres')->dropDownList(
        $model->getOpcionesSitPadres(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Situacion de padres'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
