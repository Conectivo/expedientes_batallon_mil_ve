<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use webvimark\modules\UserManagement\models\User;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\Captador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="captador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'jquia')->textInput() ?>
    <?= $form->field($model, 'jquia')->dropDownList(
        $model->getOpcionesJquia(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Jerarquía'); ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?= $form->field($model, 'nombre_completo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
	
    <?php // $form->field($model, 'captado')->textInput() ?>
    <?php /* $form->field($model, 'captado')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'cedula','fullName'),
            ['prompt'=>'Por favor, seleccioné una opción']
    )->label('Persona captada') */ ?>
    <?= $form->field($model, 'captado')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Persona::find()->all(),'cedula','fullName'), 
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Persona captada'); ?>

    <div class="form-group">
        <?php
        if ($model->isNewRecord && User::hasRole('LlenarRegistros'))
            echo Html::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear', ['class' => 'btn btn-success']);
            echo '&nbsp;';

        if (!$model->isNewRecord && User::hasRole('ModificarRegistros'))
            echo Html::submitButton('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar', ['class' => 'btn btn-primary']);
        ?>
        <?php // Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
