<?php

use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\helpers\Html;
use yii\web\JsExpression;

$this->title = 'Módulo de Captador';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---Inicia primera fila con Total de Personal Captado--->
<!---Inicia bloque de Total de Personal Captado por Jerarquia de Captador--->
<div class="row">
<div class="col-md-6">
   <div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo 'Total de personal captado'; ?></h3>
        <div class="box-tools pull-left">
            <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
<?php
    if($totalCaptadoresJquia) {
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'highcharts-3d',
            ],
            'options' => [
                'lang' => [
                    'printChart' => 'Imprimir gráfica',
                    'downloadPNG' => 'Descargar imagen PNG',
                    'downloadJPEG' => 'Descargar imagen JPEG',
                    'downloadPDF' => 'Descargar documento PDF',
                    'downloadSVG' => 'Descargar imagen vectorial SVG vector',
                    'contextButtonTitle' => 'Menú contextual de gráfica',
                ],
                'exporting' => [
                    'enabled' => true
                ],
                'legend' => [
                    'align' => 'center',
                    'verticalAlign' => 'bottom',
                    'layout' => 'vertical',
                    'x' => 0,
                    'y' => 0,
                ],
                'credits' => [
                        'enabled' => false
                 ],
                'chart' => [
                    'type' => 'pie',
                    'options3d' => [
                        'enabled' => true,
                        'alpha' => 60
                    ]
                ],
                'title' => [
                    'text' => 'Personal captado según Jerarquía de captador',
                    'margin' => 0,
                ],
                'plotOptions' => [
                    'pie' => [
                        'innerSize' => 100,
                        'depth' => 45,
                        'dataLabels' => [
                            'enabled' => false
                        ],
                        'showInLegend' => true,
                    ],
                ],
                'series' => [
                    [
                        'name' => 'Total de Personal Captado',
                        // 'data' => [["Cap (2)", 2],["Tte (1)",1]]
                        'data' => $totalCaptadoresJquia
                        // 'data' => new SeriesDataHelper($totalCaptadoresJquia, ['0:string', '1:int']),
                    ]
                ]
            ],
        ]);
    } else {
        echo '<div class="alert alert-danger">'."No hay resultados encontrados".'</div>';
    }
    ?>
    </div>
   </div>
</div>
<!---Fin de bloque de Total de Personal Captado--->

<!---Inicia bloque de Promedio de Captación de Personal Anual--->
<div class="col-md-6">
   <div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bar-chart"></i> <?php echo 'Promedio de captación anual de Personal'; ?></h3>
        <div class="box-tools pull-left">
            <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
<?php
    if($captacionPersonalAnual) {
        // $dataProvider = new \yii\data\ArrayDataProvider(['allModels' => $captacionPersonalAnual]);
        // hh($dataProvider);
        echo Highcharts::widget([
        'scripts' => [
            'modules/exporting',
        ],
        'options' => [
            'lang' => [
                'printChart' => 'Imprimir gráfica',
                'downloadPNG' => 'Descargar imagen PNG',
                'downloadJPEG' => 'Descargar imagen JPEG',
                'downloadPDF' => 'Descargar documento PDF',
                'downloadSVG' => 'Descargar imagen vectorial SVG vector',
                'contextButtonTitle' => 'Menú contextual de gráfica',
            ],
            'chart' => [
                'type' => 'column',
            ],
            'exporting' => [
                'enabled' => true,
            ],
            'credits' => [
                    'enabled' => false,
            ],
            'title' => [
                'text' => 'Captación mensual en los últimos años',
            ],
            'subtitle' => [
                'text' => '',
                'margin' => 0,
            ],
            'xAxis' => [
                'categories' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec']
            ],
            'yAxis' => [
                'title' => [
                    'text' => 'Número de captación',
                ]
            ],
            'plotOptions' => [
                 'column' => [
                    'pointPadding' => 0.2,
                    'borderWidth' => 0
                 ],
            ],
            'series' => $captacionPersonalAnual
            // 'series' => \app\controllers\CaptadorController::getPromedioCaptacionPersonalAnual()
            /* 'series' => [
                [
                    'type' => 'column',
                    'name' => '2014 (2)',
                    'data' => [0,0,0,0,0,0,0,0,0,2,0,0],
                ],
                [
                    'type' => 'column',
                    'name' => '2013 (1)',
                    'data' => [0,0,0,0,0,0,0,0,1,0,0,0],
                ],
            ],*/
            ],
        ]);
    } else {
        echo '<div class="alert alert-danger">'."No hay resultados encontrados.".'</div>';
    }
?>
    </div>
   </div>
</div>
<!---Fin de bloque de Promedio de Captación de Personal Anual--->
</div>
<!---Fin de primera fila Total de Personal Captado y Promedio de Captación de Personal Anual--->

<!---Inicia bloque de Listado del Personal recientemente captado--->
<div class="row">
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-list-ul"></i> <?php echo 'Personal recientemente captado'; ?></h3>
            <div class="box-tools pull-left">
                <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-info btn-sm" title="Remover" data-toggle="tooltip" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table no-margin">
                <thead>
                    <tr>
                        <th><?php echo 'Id'; ?></th>
                        <th><?php echo 'Cédula'; ?></th>
                        <th><?php echo 'Jerarquía'; ?></th>
                        <th><?php echo 'Nombre Completo'; ?></th>
                        <th><?php echo 'Teléfono'; ?></th>
                        <th><?php echo 'Personal Captado'; ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php if($ultimosCaptadores) : ?>
                <?php foreach($ultimosCaptadores as $key=>$value) : ?>
                    <tr>
                        <!--- <td><?php // ($key+1); ?></td> --->
                        <td><?= $value['id'];?></td>
                        <td><?= $value['cedula'];?></td>
                        <td><?= $value['nombre'];?></td>
                        <td><?= $value['nombre_completo'];?></td>
                        <td><?= $value['telefono'];?></td>
                        <td><?= Html::a($value['nombre_captado'], ['/persona/view', 'id' => $value['captado']]);?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-danger text-center"><?php echo 'No hay resultados encontrados.'; ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Captador',
                ['/captador/create'], ['class' => 'btn btn-success']
            ); ?>
            <?php // if(Yii::$app->user->can("/student/stu-master/create")) { ?>
                <?php // echo Html::a('Crear Captador', ['/captador/create'], ['class' => 'btn btn-sm btn-info btn-flat pull-left']); ?>
            <?php // } ?>
            <?= // echo Html::a('Ver Listado de Captadores', ['/captador/list'], ['class' => 'btn btn-sm btn-default btn-flat pull-right']);
                GhostHtml::a('<span class="glyphicon glyphicon-list"></span> ' . 'Ver Listado de Captadores',
		['/captador/list'], ['class' => 'btn btn-success']
	    ); ?>
        </div>
    </div>

</div>
</div>
<!---Fin de bloque de Listado del Personal recientemente captado--->
