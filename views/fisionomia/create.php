<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fisionomia */

$this->title = 'Crear Fisionomía del Personal';
$this->params['breadcrumbs'][] = ['label' => 'Fisionomía del Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fisionomia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
