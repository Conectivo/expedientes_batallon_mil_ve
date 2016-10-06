<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Fisionomia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fisionomia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'cedula_id')->textInput() ?>
    <?php /* $form->field($model, 'cedula_id')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'cedula','fullName'),
            ['prompt'=>'Por favor, seleccioné una opción']
    )->label('Persona') */?> 
    <?= $form->field($model, 'cedula_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->all(),'cedula','fullName'), 
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Persona captada'); ?>

    <?= $form->field($model, 'color_piel')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'color_cabello')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'color_cabello')->dropDownList(
        ['N'=>'Negro', 'C'=>'Castaño', 'R'=>'Rubio (Castaño claro)',
         'P'=>'Pelirrojo (Rojo anaranjado)', 'G'=>'Gris', 'B'=>'Blanco'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Color de Cabello'); */ ?>
    <?= $form->field($model, 'color_cabello')->dropDownList(
        $model->getOpcionesColorCabello(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Color de Cabello'); ?>

    <?php // $form->field($model, 'color_ojos')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'color_ojos')->dropDownList(
        ['1'=>'Castaño', '2'=>'Ámbar', '3'=>'Avellana', '4'=>'Verde', '5'=>'Azul', '6'=>'Gris'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Color de Ojos'); */ ?>
    <?= $form->field($model, 'color_ojos')->dropDownList(
        $model->getOpcionesColorOjos(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Color de Ojos'); ?>

    <?= $form->field($model, 'contextura')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'condicion_fisica')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'condicion_fisica')->dropDownList(
        ['A'=>'Apto', 'N'=>'No Apto'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Condición Física'); */ ?>
    <?= $form->field($model, 'condicion_fisica')->dropDownList(
        $model->getOpcionesCondicion(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Condición Física'); ?>

    <?php // $form->field($model, 'condicion_intelectual')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'condicion_intelectual')->dropDownList(
        ['A'=>'Apto', 'N'=>'No Apto'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Condición Intelectual'); */ ?>
    <?= $form->field($model, 'condicion_intelectual')->dropDownList(
        $model->getOpcionesCondicion(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Condición Intelectual'); ?>

    <?php // $form->field($model, 'estatura')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'estatura')->widget(MaskedInput::className(), [
        'name' => 'input-33',
        'clientOptions' => [
            'alias' =>  'decimal',
            'groupSeparator' => ',',
            'autoGroup' => true
        ],
        // 'mask' => '9999-999-9999',
    ]) ?>

    <?= $form->field($model, 'peso')->textInput() ?>

    <?php // $form->field($model, 'grupo_sanguineo')->textInput() ?>
    <?php /* $form->field($model, 'grupo_sanguineo')->dropDownList(
        ['A'=>'O-', 'B'=>'O+', 'C'=>'A-', 'D'=>'A+', 'E'=>'AB-', 'F'=>'AB+'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Grupo Sanguíneo'); */ ?>
    <?= $form->field($model, 'grupo_sanguineo')->dropDownList(
        $model->getOpcionesGrupoSangre(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Grupo Sanguíneo'); ?>

    <?= $form->field($model, 'senales_particulares')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
