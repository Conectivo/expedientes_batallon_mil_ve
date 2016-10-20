<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidad */

$this->title = 'Unidad de Batallón';
//$this->params['breadcrumbs'][] = ['label' => 'Unidad de Batallón', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->unidad, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Actualizar';
?>

<div class="col-xs-12">
  <div class="col-lg-12 col-sm-12 col-xs-12 no-padding">
    <h3 class="box-title"><i class="fa fa-edit"></i> <?php echo 'Actualizar Unidad de Batallón'; ?></h3>
  </div>
</div>

<div class="unidad-update">
    <?= $this->render('_form', ['model' => $model,]) ?>
</div>
