<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Familiares */

$this->title = 'Crear Datos Familiares';
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familiares-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
