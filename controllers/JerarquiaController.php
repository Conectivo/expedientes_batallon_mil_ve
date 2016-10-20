<?php

namespace app\controllers;

use Yii;
use app\models\Jerarquia;
use app\models\JerarquiaSearch;
use yii\bootstrap\ActiveForm;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * JerarquiaController implementa las acciones CRUD para el modelo Jerarquia.
 */
class JerarquiaController extends Controller
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
     * Muestra una lista de todos los registros del modelo Jerarquia.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JerarquiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Jerarquia();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Muestra un único registo detallado del modelo Jerarquia.
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
     * Crea un nuevo registro para el modelo Jerarquia.
     * Si la creación del registro es exitosa, el navegador será redirigido a la página de 'index'.
     * @return mixed
     */
    public function actionCreate()
    {
        // $model = new Jerarquia();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
        
        $model = new Jerarquia();
        $searchModel = new JerarquiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            $model->attributes = $_POST['Jerarquia'];
            
            if($model->save())
                return $this->redirect(['index']);
            else
                return $this->render('index', [
                    'model' => $model,'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
        } else {
                return $this->render('index', [
                    'model' => $model,'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Actualiza un registro existente del modelo Jerarquia.
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

        $model = $this->findModel($id);
        $searchModel = new JerarquiaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {

            if (Yii::$app->request->isAjax) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            $model->attributes = $_POST['Jerarquia'];

            if ($model->save())
                return $this->redirect(['index']);
            else
                return $this->render('index', [
                    'model' => $model,'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
        } else {
            return $this->render('index', [
                'model' => $model,'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Elimina un registro existente del modelo Jerarquia.
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
     * Busca el modelo Jerarquia basado en su valor de clave principal.
     * Si no se encuentra el modelo, se produce una excepción HTTP 404.
     * @param integer $id
     * @return Jerarquia el modelo cargado
     * @throws NotFoundHttpException si no se encuentra el modelo
     */
    protected function findModel($id)
    {
        if (($model = Jerarquia::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
