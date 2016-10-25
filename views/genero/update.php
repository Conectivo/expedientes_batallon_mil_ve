<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Genero */

$this->title = 'Género del Personal / Oficial';
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
?>

<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
  	<h3 class="box-title"><i class="fa fa-edit"></i> <?php echo 'Actualizar Género del Personal / Oficial'; ?></h3>
  </div>
</div>

<div class="genero-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
