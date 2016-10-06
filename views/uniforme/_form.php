<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Uniforme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uniforme-form">

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

    <?php // $form->field($model, 'tipo_talla')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'tipo_talla')->dropDownList(
        ['a'=>'XXS', 'b'=>'XS', 'c'=>'S', 'd'=>'M', 'e'=>'L', 'f'=>'XL', 'g'=>'XXL', 'h'=>'XXXL'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Tallas'); */ ?>
    <?= $form->field($model, 'tipo_talla')->dropDownList(
        $model->getOpcionesTallas(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Tallas'); ?>

    <?= $form->field($model, 'gorra')->textInput() ?>

    <?= $form->field($model, 'calzado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
