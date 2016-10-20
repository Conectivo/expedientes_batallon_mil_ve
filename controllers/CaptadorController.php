<?php

namespace app\controllers;

use Yii;
use app\models\Captador;
use app\models\CaptadorSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CaptadorController implementa las acciones CRUD para el modelo Captador.
 */
class CaptadorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Muestra una lista de todos los registros del modelo Captador.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaptadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $captacionPersonalAnual = [];

        // Total de Personal Captado por Jerarquia de Captador
        /* SELECT CONCAT(jq.nombre, ' (', COUNT( cp.id ), ')') AS '0', COUNT( cp.id ) AS '1'
        FROM captador cp
        INNER JOIN jerarquia jq ON jq.id = cp.jquia_id
        GROUP BY cp.jquia_id; */
        $totalCaptadoresJquia = (new \yii\db\Query())
                ->select(["CONCAT(jq.nombre, ' (', COUNT( cp.id ), ')') AS '0'", 'COUNT(cp.id) AS "1"'])
                ->from(['captador cp'])
                ->join('JOIN', 'jerarquia jq', 'jq.id = cp.jquia_id')
                ->groupBy('cp.jquia_id')
                ->all();

        // Promedio de Captación de Personal Anual
        /* SELECT CONCAT(pe.fecha_ingreso, ' (', COUNT( cp.id ), ')') AS 'anoDetalle',
        DATE_FORMAT(pe.fecha_ingreso, "%Y") AS "ano"
        FROM persona pe
        INNER JOIN captador cp ON cp.captado = pe.cedula
        GROUP BY DATE_FORMAT(pe.fecha_ingreso, "%Y")
        ORDER BY YEAR(pe.fecha_ingreso)
        DESC LIMIT 3; */
        $captadoAnual = (new \yii\db\Query())
            ->select([
                "CONCAT(DATE_FORMAT(pe.fecha_ingreso, '%Y'), ' (', COUNT(cp.id), ')') AS 'anoDetalle'",
                'DATE_FORMAT(pe.fecha_ingreso, "%Y") AS "ano"'
                // 'DATE_FORMAT(2013-09-02, "%Y") AS "ano"'
            ])
            ->from('persona pe')
            ->join('JOIN', 'captador cp', 'cp.captado = pe.cedula')
            ->groupBy(['DATE_FORMAT(pe.fecha_ingreso, "%Y")'])
            ->orderBy('YEAR(pe.fecha_ingreso) DESC')
            ->limit('3')
            ->all();

        //hh($captadoAnual);
        foreach($captadoAnual as $key => $value) {
            $resultadosAnual = $conteoMensual = [];
            for($item = 1; $item <= 12; $item++) {
                /* SELECT * FROM persona pe
                JOIN captador cp ON cp.captado = pe.cedula
                WHERE YEAR(pe.fecha_ingreso) = 2013 AND MONTH(pe.fecha_ingreso) = 09 */
                $conteoMensualTemp = (new \yii\db\Query())
                ->from('persona pe')
                ->join('JOIN', 'captador cp', 'cp.captado = pe.cedula')
                ->where([
                    // 'YEAR(pe.fecha_ingreso)' => ['between', 'YEAR(pe.fecha_ingreso)', 1900, 2016],
                    // 'YEAR(2013-09-02)' => 2013,
                    'YEAR(pe.fecha_ingreso)' => $value['ano'],
                    'MONTH(pe.fecha_ingreso)' => $item
                ])->count();
                $conteoMensual[] = $conteoMensualTemp;
            }
            // $resultadosAnual = ['name' => '2013 (1)', 'data' => $conteoMensual];
            $resultadosAnual = ['name' => $value['anoDetalle'], 'data' => $conteoMensual];
            $captacionPersonalAnual[] = $resultadosAnual;
        }

        // Listado del Personal recientemente captado
        /* SELECT cp.id, cp.jquia_id, cp.cedula, cp.nombre_completo, cp.telefono,
        cp.captado, CONCAT_WS(', ', pe.nombres, pe.apellidos) AS nombre_captado
        FROM captador cp
        INNER JOIN persona pe ON pe.cedula = cp.captado
        INNER JOIN jerarquia jq ON jq.id = cp.jquia_id
        ORDER BY cp.id DESC
        LIMIT 10; */
        $ultimosCaptadores = (new \yii\db\Query())
                ->select(['cp.id', 'cp.cedula', 'jq.nombre', 'cp.nombre_completo', 'cp.telefono', 'cp.captado', "CONCAT(pe.nombres, ' ', pe.apellidos) AS 'nombre_captado'"])
                ->from(['captador cp'])
                ->join('JOIN', 'persona pe', 'pe.cedula = cp.captado')
                ->join('JOIN', 'jerarquia jq', 'jq.id = cp.jquia_id')
                ->orderBy('cp.id DESC')
                ->limit(10)
                ->all();

        //hh($captacionPersonalAnual);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ultimosCaptadores' => $ultimosCaptadores,
            'totalCaptadoresJquia' => $totalCaptadoresJquia,
            'captacionPersonalAnual' => $captacionPersonalAnual,
        ]);
    }

    /**
     * Muestra una lista de todos los registros del modelo Captador.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new CaptadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un único registo detallado del modelo Captador.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo registro para el modelo Captador.
     * Si la creación del registro es exitosa, el navegador será redirigido a la página de 'vista'.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Captador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza un registro existente del modelo Captador.
     * Si la actualización del registro es exitosa, el navegador será redirigido a la página de 'vista'.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Elimina un registro existente del modelo Captador.
     * Si la eliminación del registro es exitosa, el navegador será redirigido a la página de 'index'.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca el modelo Captador basado en su valor de clave principal.
     * Si no se encuentra el modelo, se produce una excepción HTTP 404.
     * @param integer $id
     * @return Captador el modelo cargado
     * @throws NotFoundHttpException si no se encuentra el modelo
     */
    protected function findModel($id)
    {
        if (($model = Captador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
