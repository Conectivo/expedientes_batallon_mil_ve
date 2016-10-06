<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fisionomia */

$this->title = 'Actualizar Fisionomía del Personal: ' . $model->cedula_id;
$this->params['breadcrumbs'][] = ['label' => 'Fisionomía del Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedula_id, 'url' => ['view', 'id' => $model->cedula_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="fisionomia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
