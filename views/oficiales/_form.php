<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\widgets\ActiveForm;
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

    <?= $form->field($model, 'jquia_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(app\models\Jerarquia::find()->all(),'id','nombre'),
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Jerarquía'); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?= $form->field($model, 'sexo')->widget(Select2::classname(), [
        'data' => $model->getOpcionesSexo(),
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Sexo'); ?>

    <?php /* $form->field($model, 'situacion')->dropDownList(
        ['1'=>'Disponible', '2'=>'Comisión', '3'=>'Operación Centinela', '4'=>'Permiso', '5'=>'Otra'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Situación'); */ ?>
    <?= $form->field($model, 'situacion')->widget(Select2::classname(), [
        'data' => $model->getOpcionesSituacion(),
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Situación'); ?>

    <?= $form->field($model, 'email')->textInput(
        [
            'maxlength' => true,
            'type' => 'email', 'id' => 'email',
            'class' => 'form-control email',
        ]
    ); ?>

    <?= $form->field($model, 'arma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_emergencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefonos_emergencia')->textInput(['maxlength' => true]) ?>

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
