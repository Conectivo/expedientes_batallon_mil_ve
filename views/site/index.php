<?php

use webvimark\modules\UserManagement\components\GhostHtml;
/* @var $this yii\web\View */

$this->title = 'Sistema de expedientes';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cuartel Negro Primero</h1>
        <a href="index.html" target="_blank" 
           title='Cuartel Negro Primero - Batallón de Apoyo Logístico 208 General de Brigada "Juan Antonio Paredes"'>
           <?= yii\helpers\Html::img('@web/images/logo.png', ['id'=>'logo-ejercito', 'class'=>'img-responsive', 'width'=>'180', 'height'=>'256', 'alt'=>'Cuartel Negro Primero - Batallón de Apoyo Logístico 208 General de Brigada "Juan Antonio Paredes"']); ?> 
        </a>
        <br />
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            <?php echo $totalUnidades = app\models\Unidad::find()->count(); ?>
                        </h3>
                        <p>
                            <?php if($totalUnidades <= 1) echo 'Unidad de Batallón'; else echo 'Unidades de Batallón'; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <?= GhostHtml::a('Más información'.' <i class="fa fa-arrow-circle-right"></i>', ['/unidad/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                          <?php echo $totalPersona = app\models\Persona::find()->count(); ?>
                        </h3>
                        <p>
                            <?php if($totalPersona <= 1) echo 'Persona'; else echo 'Personas'; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                    <?= GhostHtml::a('Más información'.' <i class="fa fa-arrow-circle-right"></i>', ['/persona/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                           <?php echo $totalOficiales = app\models\Oficiales::find()->count(); ?>
                        </h3>
                        <p>
                            <?php if($totalOficiales <= 1) echo 'Oficial'; else echo 'Oficiales'; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <?= GhostHtml::a('Más información'.' <i class="fa fa-arrow-circle-right"></i>', ['/oficiales/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo $totalCaptadores = app\models\Captador::find()->count(); ?>
                        </h3>
                        <p>
                            <?php if($totalCaptadores <= 1) echo 'Captador de Personal'; else echo 'Captadores de Personal'; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-street-view"></i>
                    </div>
                    <?= GhostHtml::a('Más información'.' <i class="fa fa-arrow-circle-right"></i>', ['/captador/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <br /><br /><br />
        <p class="lead">Sistema de Expedientes del Cuartel Negro Primero - Batallón de Apoyo Logístico 208 General de Brigada "Juan Antonio Paredes".</p>

    </div>

</div>
