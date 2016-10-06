<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FisionomiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fisionomia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cedula_id') ?>

    <?= $form->field($model, 'color_piel') ?>

    <?= $form->field($model, 'color_cabello') ?>

    <?= $form->field($model, 'color_ojos') ?>

    <?= $form->field($model, 'contextura') ?>

    <?php // echo $form->field($model, 'condicion_fisica') ?>

    <?php // echo $form->field($model, 'condicion_intelectual') ?>

    <?php // echo $form->field($model, 'estatura') ?>

    <?php // echo $form->field($model, 'peso') ?>

    <?php // echo $form->field($model, 'grupo_sanguineo') ?>

    <?php // echo $form->field($model, 'senales_particulares') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reiniciar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
