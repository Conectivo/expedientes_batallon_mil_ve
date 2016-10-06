<?php

namespace app\controllers;

use Yii;
use app\models\Estados;
use app\models\Municipios;
use app\models\Parroquias;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonaController implements the CRUD actions for Persona model.
 */
class PersonaController extends Controller
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
     * Lists all Persona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persona model.
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
     * Creates a new Persona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();

        $estados = Estados::find()->all();
        $municipios = [];
        $parroquias = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['estatus/create', 'consejo_comunal_id' => $model->id]);
            return $this->redirect(['view', 'id' => $model->cedula]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'estados' => $estados,
                'municipios' => $municipios,
                'parroquias' => $parroquias,
            ]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cedula]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Persona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cedula]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Persona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
      * LJAH
      * Finds the Municipios model based on id_estado value.
      * @param integer $id
      * @return Json Municipios data if success
    */
    public function actionAjaxMunicipio($id_estado)
    {
        if (Yii::$app->request->isAjax)
        {
              if (($model = Municipios::find()
                            ->where(['id_estado' => $id_estado])->all()) !== null) {
                    if (count($model) > 0)
                    {
                        foreach($model as $municipio)
                        {
                            echo '<option value="'.$municipio->id_municipio.'">'.$municipio->municipio.'</option>';
                        }
                    }
                    else
                    {
                        echo '<option>No hay resultados</option>';
                    }
              } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
      * LJAH
      * Finds the Parroquias model based on id_municipio value.
      * @param integer $id
      * @return Json Municipios data if success
    */
    public function actionAjaxParroquia($id_municipio)
    {
        if (Yii::$app->request->isAjax)
        {
              if (($model = Parroquias::find()
                            ->where(['id_municipio' => $id_municipio])->all()) !== null) {
                    if (count($model) > 0)
                    {
                        foreach($model as $parroquia)
                        {
                            echo '<option value="'.$parroquia->id_parroquia.'">'.$parroquia->parroquia.'</option>';
                        }
                    }
                    else
                    {
                        echo '<option>No hay resultados</option>';
                    }
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Persona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persona::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
