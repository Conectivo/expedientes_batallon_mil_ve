<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Captador */

$this->title = 'Actualizar Captador: ' . $model->jquia->nombre . " ". $model->nombre_completo;
$this->params['breadcrumbs'][] = ['label' => 'Captadores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_completo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="captador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
