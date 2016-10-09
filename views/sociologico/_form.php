<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Sociologico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sociologico-form">

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
    ])->label('Persona captada'); ?>

    <?php // $form->field($model, 'grado')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'grado')->dropDownList(
        ['IP'=>'Inicial (Preescolar)', 'PB'=>'Primaria (Básica)',
         'MSG'=>'Media (Secundaria) - General', 'MST'=>'Media (Secundaria) - Técnica',
         'UPR'=>'Universitaria - Pre-grado', 'UPO'=>'Universitaria - Posgrado'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Grado de instrucción'); */ ?>
    <?= $form->field($model, 'grado')->dropDownList(
        $model->getOpcionesGrado(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Grado de instrucción'); ?>

    <?php // $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'profesion')->dropDownList(
        $model->getOpcionesProfesion(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Profesión'); ?>

    <?php // $form->field($model, 'vivienda')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'vivienda')->dropDownList(
        $model->getOpcionesVivienda(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('¿Posee Vivienda?'); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
