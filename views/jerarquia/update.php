<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jerarquia */

$this->title = 'Jerarquías del Personal';
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
?>

<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
  	<h3 class="box-title"><i class="fa fa-edit"></i> <?php echo 'Actualizar Jerarquías del Personal'; ?></h3>
  </div>
</div>

<div class="jerarquia-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
