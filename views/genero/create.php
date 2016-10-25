<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Genero */
?>

<div class="col-xs-12">
    <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
	    <h3 class="box-title">
	        <i class="fa fa-plus"></i> <?php echo 'Crear Género del Personal / Oficial'; ?>
	    </h3>
    </div>
</div>

<div class="genero-create">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
