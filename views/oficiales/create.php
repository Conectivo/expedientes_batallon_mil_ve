<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Oficiales */

$this->title = 'Crear Oficiales';
$this->params['breadcrumbs'][] = ['label' => 'Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oficiales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
