<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\web\JsExpression;

$this->title = 'Módulo de Oficiales';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---Inicia primera fila con Total de Oficiales por Jerarquía--->
<!---Inicia bloque de Total de Oficiales por Jerarquía--->
<div class="row">
<div class="col-md-6">
   <div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-graduation-cap"></i> <?php echo 'Total de oficiales por Jerarquía'; ?></h3>
        <div class="box-tools pull-left">
            <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
<?php
    if($totalOficialesJquia) {
        echo Highcharts::widget([
            'scripts' => [
                'modules/exporting',
                'highcharts-3d',
            ],
            'options' => [
                'exporting' => [
                    'enabled' => false
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
                    'text' => 'Total oficiales según su Jerarquía',
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
                        'name' => 'Total de Oficiales por Jerarquía',
                        //'data' => [["Cap (2)", 2],["Tte (1)",1]]
                        'data' => $totalOficialesJquia
                        // 'data' => new SeriesDataHelper($totalOficialesJquia, ['0:string', '1:int']),
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
<!---Fin de bloque de Total de Oficiales por Jerarquía--->

<!---Inicia bloque de Oficiales por Sexo--->
<div class="col-md-6">
   <div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-pie-chart"></i> <?php echo 'Oficiales por Sexo'; ?></h3>
        <div class="box-tools pull-left">
            <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
<?php
    if($totalOficialesSexo) {
        echo Highcharts::widget([
            'options' => [
                'exporting' => [
                    'enabled' => false
                ],
                'colors' => ['#F45B5B', '#F7A35C', '#2B908F'],
                'legend' => [
                    'align' => 'center',
                    'verticalAlign' => 'bottom',
                    'layout' => 'horizontal',
                    'x' => 0,
                    'y' => 0,
                ],
                'credits' => [
                        'enabled' => false
                 ],
                'chart' => [
                    'type' => 'pie',
                ],
                'title' => [
                    'text' => '',
                    'margin' => 0,
                ],
                'plotOptions' => [
                    'pie' => [
                        'allowPointSelect' => true,
                                'cursor' => 'pointer',
                        'innerSize' => 80,
                        'depth' => 45,
                        'dataLabels' => [
                            'enabled' => false
                             ],
                         'showInLegend' => true,
                    ],
                    'series' => [
                        'pointPadding' => 0,
                        'groupPadding' => 0,
                     ],
                ],
                'series'=> [
                    [
                        // 'name' => 'Total de Oficiales por Sexo',
                        'data' => $totalOficialesSexo
                    ]
                ]
            ],
        ]);
    } else {
        echo '<div class="alert alert-danger">'."No hay resultados encontrados.".'</div>';
    }
?>
    </div>
   </div>
</div>
<!---Fin de bloque de Oficiales por Sexo--->
</div>
<!---Fin de primera fila Total de Oficiales por Jerarquía y Oficiales por Sexo--->

<!---Inicia bloque de Listado del Oficiales recientemente registrados--->
<div class="row">
<div class="col-md-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-list-ul"></i> <?php echo 'Oficiales recientemente registrados'; ?></h3>
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
                        <th><?php echo 'Jerarquía'; ?></th>
                        <th><?php echo 'Nombres'; ?></th>
                        <th><?php echo 'Apellido'; ?></th>
                        <th><?php echo 'Cédula'; ?></th>
                        <!--- <th><?php // <th><?php echo 'Sexo'; ?></th> --->
                        <!--- <th><?php // <th><?php echo 'Situación'; ?></th> --->
                        <th><?php echo 'Correo electrónico'; ?></th>
                        <!--- <th><?php // echo 'Arma'; ?></th> --->
                        <th><?php echo 'Cargo'; ?></th>
                        <!--- <th><?php // 'Dirección'; ?></th> --->
                        <th><?php echo 'Teléfono'; ?></th>
                        <!--- <th><?php // echo 'Dirección de Emergencia'; ?></th> --->
                        <!--- <th><?php // echo 'Teléfono de Emergencia'; ?></th> --->
                    </tr>
                </thead>
                <tbody>
                <?php if($ultimosOficiales) : ?>
                <?php foreach($ultimosOficiales as $key=>$value) : ?>
                    <tr>
                        <!--- <td><?php // ($key+1); ?></td> --->
                        <td><?= $value['id'];?></td>
                        <td><?= $value['jquia'];?></td>
                        <td><?= $value['nombres'];?></td>
                        <td><?= $value['apellidos'];?></td>
                        <td><?= $value['cedula'];?></td>
                        <!--- <td><?php // $value['sexo_id'];?></td> --->
                        <!--- <td><?php // $value['situacion'];?></td> --->
                        <td><?= Html::mailto($value['email'], $value['email'], ['title' => 'Escribir un correo electrónico']);?></td>
                        <!--- <td><?php // $value['arma'];?></td> --->
                        <td><?= $value['cargo'];?></td>
                        <!--- <td><?php // $value['direccion'];?></td> --->
                        <td><?= $value['telefono'];?></td>
                        <!--- <td><?php // $value['direccion_emergencia'];?></td> --->
                        <!--- <td><?php // $value['telefonos_emergencia'];?></td> --->
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
            <?= GhostHtml::a('<span class="glyphicon glyphicon-plus-sign"></span> ' . 'Crear Oficial',
                ['/oficiales/create'], ['class' => 'btn btn-success']
            ); ?>
            <?php // if(Yii::$app->user->can("/student/stu-master/create")) { ?>
                <?php // echo Html::a('Crear Captador', ['/oficiales/create'], ['class' => 'btn btn-sm btn-info btn-flat pull-left']); ?>
            <?php // } ?>
            <?= // echo Html::a('Ver Listado de Oficiales', ['/oficiales/list'], ['class' => 'btn btn-sm btn-default btn-flat pull-right']);
                GhostHtml::a('<span class="glyphicon glyphicon-list"></span> ' . 'Ver Listado de Oficiales',
        ['/oficiales/list'], ['class' => 'btn btn-success']
        ); ?>
        </div>
    </div>

</div>
</div>
<!---Fin de bloque de Listado del Oficiales recientemente registrados--->
