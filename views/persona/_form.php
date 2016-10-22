<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use yii\helpers\Url;
use yii\web\View;
use webvimark\modules\UserManagement\models\User;
use app\models\Unidad;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */
/* @var $form yii\widgets\ActiveForm */

$url = Url::to(['ajax-municipio']);
$url_ciudad = Url::to(['ajax-ciudad']);
$this->registerJs(
"
$('#persona-estado_id').on('change', function(e) {
    $.ajax({
        url: '".$url."',
        data: {id_estado: $('#persona-estado_id').val()},
        success: function(html) {
            console.log(html);
            $('#".Html::getInputId($model, 'municipio_id')."').html(html);
        },
        error: function(result) {
            alert('Estado no encontrado');
        }
    });
    $.ajax({
        url: '".$url_ciudad."',
        data: {id_estado: $('#persona-estado_id').val()},
        success: function(html) {
            console.log(html);
            $('#".Html::getInputId($model, 'lugar_nacimiento')."').html(html);
        },
        error: function(result) {
            alert('Ciudad no encontrado');
        }
    });
});
", View::POS_READY);

$url = Url::to(['ajax-parroquia']);
$this->registerJs(
"
$('#persona-municipio_id').on('change', function(e) {
    $.ajax({
        url: '".$url."',
        data: {id_municipio: $('#persona-municipio_id').val()},
        success: function(html) {
            console.log(html);
            $('#".Html::getInputId($model, 'parroquia_id')."').html(html);
        },
        error: function(result) {
            alert('Municipio no encontrado');
        }
    });
});
", View::POS_READY);

?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cedula')->textInput() ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_id')->dropDownList(
        ArrayHelper::map($estados, 'id_estado','estado'),
        ['prompt'=>'--Seleccione--',]
    ); ?>

    <?= $form->field($model, 'municipio_id')->dropDownList(
          ArrayHelper::map($municipios, 'id_municipio','municipio'),
          ['prompt'=>'--Seleccione--',]
    ); ?>

    <?= $form->field($model, 'parroquia_id')->dropDownList(
        ArrayHelper::map($parroquias, 'id_parroquia','parroquia'),
        ['prompt'=>'--Seleccione--',]
    ); ?>

    <?= $form->field($model, 'lugar_nacimiento')->dropDownList(
        ArrayHelper::map($parroquias, 'id_parroquia','parroquia'),
        ['prompt'=>'--Seleccione--',]
    )->label('Ciudad (Lugar de nacimiento)'); ?>

    <?php // $form->field($model, 'fecha_nacimiento')->textInput() ?>
    <?= $form->field($model,'fecha_nacimiento')->
        widget(DatePicker::className(), [
            'dateFormat' => 'yyyy-MM-dd',
            'language' => 'es',
            'clientOptions' => [
                // 'numberOfMonths' => 2,
                // 'yearRange' => '2000:2099',
                'yearRange' => '-115:+0',
                // 'minDate' => -5,
                // 'maxDate' => '+1M +5D',
                'changeMonth' => true,
                'changeYear' => true
            ],
            'options' => ['class' => 'form-control', 'readonly' => 'readonly']
        ])->label('Fecha de nacimiento') ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_movil')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'religion')->textInput() ?>
    <?php /* $form->field($model, 'religion')->dropDownList(
        ['1'=>'Catolicismo','2'=>'Protestante','3'=>'Movimiento de los Santos de los Últimos Días',
         '4'=>'Judaísmo','5'=>'Islam','6'=>'Budismo','7'=>'Santería Caribeña','8'=>'Espiritismo',
         '9'=>'Ateísmo','10'=>'Otra creencia',],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Religión'); */ ?>
    <?php /* $form->field($model, 'religion')->dropDownList(
        $model->getOpcionesReligion(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Religión'); */ ?>
    <?= $form->field($model, 'religion')->widget(Select2::classname(), [
        'data' => $model->getOpcionesReligion(),
        'language' => 'es',
        'options' => ['placeholder' => 'Por favor, seleccioné una opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Religión'); ?>

    <?php // $form->field($model, 'estado_civil')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'estado_civil')->dropDownList(
        ['S'=>'Soltero', 'C'=>'Casado', 'V'=>'Viudo'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Estado civil'); */ ?>
    <?= $form->field($model, 'estado_civil')->dropDownList(
        $model->getOpcionesEdoCivil(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Estado civil'); ?>

    <?php // $form->field($model, 'modalidad')->textInput(['maxlength' => true]) ?>
    <?php /* $form->field($model, 'modalidad')->dropDownList(
        ['C'=>'Tiempo completo', 'P'=>'Tiempo parcial'],
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Modalidad'); */ ?>
    <?= $form->field($model, 'modalidad')->dropDownList(
        $model->getOpcionesModalidad(),
        ['prompt'=>'Por favor, seleccioné una opción',]
    )->label('Modalidad'); ?>

    <?php // $form->field($model, 'fecha_ingreso')->textInput() ?>
    <?= $form->field($model,'fecha_ingreso')->
        widget(DatePicker::className(),[
            'dateFormat' => 'yyyy-MM-dd',
            'language' => 'es',
            'clientOptions' => [
                // 'numberOfMonths' => 2,
                // 'yearRange' => '2000:2099',
                'yearRange' => '-115:+0',
                // 'minDate' => -5,
                // 'maxDate' => '+1M +5D',
                'changeMonth' => true,
                'changeYear' => true
            ],
            'options' => ['class' => 'form-control', 'readonly' => 'readonly']
        ])->label('Fecha de Ingreso') ?>

    <?= $form->field($model, 'unidad_id')->dropDownList(
        ArrayHelper::map(Unidad::find()->all(),'id','unidad'),
            ['prompt'=>'Por favor, seleccioné una opción']
    )->label('Unidad asignada') ?> 

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
