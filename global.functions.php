<?php

/**
 * Retorna las variables almacenadas en el helper VarDumper de yii2, ideal para depuracion
 *
 * @return array
 */
function hh($data)
{
    /* Fuente: https://github.com/yiisoft/yii2/issues/7352
    http://www.yiiframework.com/doc-2.0/yii-helpers-vardumper.html
    http://www.yiiframework.com/doc-2.0/yii-helpers-basevardumper.html#dump()-detail
    */
    yii\helpers\VarDumper::dump($data, 10, true);
    // yii\helpers\VarDumper::dumpAsString($data, 10, true);
    // yii\helpers\VarDumper::export($data, 10, true);
    Yii::$app->end();
}
