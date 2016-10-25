<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?php echo $model->isNewRecord ? 'box-success' : 'box-info'; ?> unidad-form">

    <?php
    if($this->context->action->id == 'update')
        $action = ['update', 'id'=>$_REQUEST['id']];
    else
        $action = ['create'];
    ?>
    <?php $form = ActiveForm::begin([
            'id' => 'unidad-form',
            'enableAjaxValidation' => true,
            'action' => $action,
            'fieldConfig' => [
                'template' => "{input}{error}",
            ],
    ]); ?>
    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ingrese el ' . $model->getAttributeLabel('nombre') . ' de Batallón'
    ]) ?>

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
