<?php

namespace app\modules\reporte\controllers;

class OficialesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOficialesreport()
    {
        return $this->render('oficialesreport');
    }

}
