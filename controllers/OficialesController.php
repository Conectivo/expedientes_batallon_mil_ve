<?php

namespace app\controllers;

use Yii;
use app\models\Oficiales;
use app\models\OficialesSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OficialesController implementa las acciones CRUD para el modelo Oficiales.
 */
class OficialesController extends Controller
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
     * Muestra una lista de todos los registros del modelo Oficiales.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OficialesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Total de Oficiales por Jerarquía
        /* SELECT CONCAT(jq.nombre, ' (', COUNT( of.id ), ')') AS '0', COUNT( of.id ) AS '1'
        FROM oficiales of
        JOIN jerarquia jq ON jq.id = of.jquia_id
        WHERE of.status = 1
        GROUP BY of.jquia_id; */
        $totalOficialesJquia = (new \yii\db\Query())
                ->select(["CONCAT(jq.nombre, ' (', COUNT( of.id ), ')') AS '0'", 'COUNT(of.id) AS "1"'])
                ->from(['oficiales of'])
                ->join('JOIN', 'jerarquia jq', 'jq.id = of.jquia_id')
                ->where(['of.status' => 1])
                ->groupBy('of.jquia_id')
                ->all();

        // Total de Oficiales por Sexo
        /* SELECT CONCAT(ge.nombre, ' (', COUNT( of.id ), ')') AS '0', COUNT( of.id ) AS '1'
        FROM oficiales of
        JOIN jerarquia jq ON jq.id = of.jquia_id
        JOIN genero ge ON ge.id = of.sexo_id
        WHERE of.status = 1
        GROUP BY ge.id; */
        $totalOficialesSexo = (new \yii\db\Query())
                ->select(['CONCAT(ge.nombre, " (", COUNT( of.id ), ")") AS "0"', 'COUNT( of.id ) AS "1"'])
                ->from(['oficiales of'])
                ->join('JOIN', 'jerarquia jq', 'jq.id = of.jquia_id')
                ->join('JOIN', 'genero ge', 'ge.id = of.sexo_id')
                ->where(['of.status' => 1])
                ->groupBy('ge.id')
                ->all();

        // Listado del Oficiales recientemente captado
        /* SELECT of.id, jq.nombre AS jquia, of.nombres, of.apellidos, of.situacion, of.cedula, of.sexo_id, of.email, of.arma, of.cargo, of.direccion, of.telefono, of.direccion_emergencia, of.telefonos_emergencia
        FROM oficiales of
        JOIN jerarquia jq ON jq.id = of.jquia_id
        WHERE of.status = 1
        ORDER BY of.id DESC
        LIMIT 10; */
        $ultimosOficiales = (new \yii\db\Query())
                ->select(['of.id', 'jq.nombre AS jquia', 'of.nombres', 'of.apellidos', 'of.situacion', 'of.cedula', 'of.sexo_id', 'of.email', 'of.arma', 'of.cargo', 'of.direccion', 'of.telefono', 'of.direccion_emergencia', 'of.telefonos_emergencia'])
                ->from(['oficiales of'])
                ->join('JOIN', 'jerarquia jq', 'jq.id = of.jquia_id')
                ->where(['of.status' => 1])
                ->orderBy('of.id DESC')
                ->limit(10)
                ->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalOficialesJquia' => $totalOficialesJquia,
            'totalOficialesSexo' => $totalOficialesSexo,
            'ultimosOficiales' => $ultimosOficiales,
        ]);
    }

    /**
     * Muestra una lista de todos los registros del modelo Oficiales.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new OficialesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un único registo detallado del modelo Oficiales.
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
     * Crea un nuevo registro para el modelo Oficiales.
     * Si la creación del registro es exitosa, el navegador será redirigido a la página de 'vista'.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Oficiales();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza un registro existente del modelo Oficiales.
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
     * Elimina un registro existente del modelo Oficiales.
     * Si la eliminación del registro es exitosa, el navegador será redirigido a la página de 'index'.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->status = 0;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Busca el modelo Oficiales basado en su valor de clave principal.
     * Si no se encuentra el modelo, se produce una excepción HTTP 404.
     * @param integer $id
     * @return Oficiales el modelo cargado
     * @throws NotFoundHttpException si no se encuentra el modelo
     */
    protected function findModel($id)
    {
        if (($model = Oficiales::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
