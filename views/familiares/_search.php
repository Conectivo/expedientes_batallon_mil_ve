<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Persona;

/* @var $this yii\web\View */
/* @var $model app\models\FamiliaresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="familiares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'cedula_id') ?>
    <?= $form->field($model, 'cedula_id')->dropDownList(
        ArrayHelper::map(Persona::find()->all(),'cedula','fullName'),
            ['prompt'=>'Por favor, seleccioné una opción']
    )->label('Persona') ?> 

    <?= $form->field($model, 'nombre_madre') ?>

    <?= $form->field($model, 'nombre_padre') ?>

    <?= $form->field($model, 'nombre_conyugue') ?>

    <?= $form->field($model, 'cantidad_hijos') ?>

    <?php // echo $form->field($model, 'sit_padres') ?>
    <?= $form->field($model, 'sit_padres')->dropDownList(
        $model->getOpcionesSitPadres(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Situacion de padres'); ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
