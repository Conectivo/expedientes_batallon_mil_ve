<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sociologico */

$this->title = 'Crear Datos Sociológicos';
$this->params['breadcrumbs'][] = ['label' => 'Datos Sociológicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sociologico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
