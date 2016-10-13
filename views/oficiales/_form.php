<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Oficiales */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(
"
  (function($){
    $(function() {
      $('.email').emailautocomplete({
	// suggClass: 'custom-classname', // por defecto: 'eac-sugg'. su nombre de clase CSS personalizada (opcional)
        domains: ['cantv.net', 'mipunto.com'] // agregue sus propios dominios de correo aquí
      });
    });
  }(jQuery));
", View::POS_READY);

?>

<div class="oficiales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'jquia')->textInput(['maxlength' => true]) ?>

    <?php /* $form->field($model, 'jquia')->dropDownList(
        ['A'=>'Tcnel', 'B'=>'My', 'C'=>'Cap', 'D'=>'1Tte', 'E'=>'Tte', 'F'=>'S/Sup'
        , 'G'=>'SM/1ra', 'H'=>'SM/2da', 'I'=>'SM/3ra', 'J'=>'S/1ro', 'K'=>'S/2do'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Jerarquía'); */ ?>

    <?= $form->field($model, 'jquia')->dropDownList(
        $model->getOpcionesJquia(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Jerarquía'); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?php // $form->field($model, 'situacion')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'situacion')->dropDownList(
        ['1'=>'Disponible', '2'=>'Comisión', '3'=>'Operación Centinela', '4'=>'Permiso', '5'=>'Otra'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Situación'); */ ?>
    <?= $form->field($model, 'situacion')->dropDownList(
        $model->getOpcionesSituacion(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Situación'); ?>

    <?= $form->field($model, 'email')->textInput(
        [
            'maxlength' => true,
            'type' => 'email', 'id' => 'email',
            'class' => 'form-control email',
            // 'placeholder' => 'Ingrese su correo electrónico'
        ]
    ); ?>

    <?= $form->field($model, 'arma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'direccion_emergencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefonos_emergencia')->textInput() ?>

    <div class="form-group">
        <?php
        if ($model->isNewRecord && User::hasRole('LlenarRegistros'))
            echo Html::submitButton('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear',
                ['class' => 'btn btn-success']
            ) . '&nbsp;';

        if (!$model->isNewRecord && User::hasRole('ModificarRegistros'))
            echo Html::submitButton('<span class="glyphicon glyphicon-edit"></span> ' . 'Actualizar',
                ['class' => 'btn btn-primary']);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
