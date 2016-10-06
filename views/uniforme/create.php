<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Uniforme */

$this->title = 'Crear Uniforme del Personal';
$this->params['breadcrumbs'][] = ['label' => 'Uniforme del Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uniforme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
