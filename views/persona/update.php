<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = 'Actualizar Persona: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName, 'url' => ['view', 'id' => $model->cedula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        /*'estados' => $estados,
        'municipios' => $municipios,
        'parroquias' => $parroquias,*/
    ]) ?>

</div>
