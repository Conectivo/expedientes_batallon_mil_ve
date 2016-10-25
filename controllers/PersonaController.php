<?php

namespace app\controllers;

use Yii;
use app\models\Estados;
use app\models\Ciudades;
use app\models\Municipios;
use app\models\Parroquias;
use app\models\Familiares;
use app\models\Captador;
use app\models\Sociologico;
use app\models\Fisionomia;
use app\models\Unidad;
use app\models\Uniforme;
use app\models\Persona;
use app\models\PersonaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonaController implementa las acciones CRUD para el modelo Persona.
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
     * Muestra una lista de todos los registros del modelo Persona.
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
     * Muestra un único registo detallado del modelo Persona.
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
     * Muestra una vista detallada del expediente del Personal.
     * @param integer $id
     * @return mixed
     */
    public function actionDetalles($id)
    {
        $modelPersona = $this->findModel($id);

        $modelFamiliares = Familiares::find()
                            ->where(['cedula_id' => $id])->one();

        $modelSociologico = Sociologico::find()
                            ->where(['cedula_id' => $id])->one();

        $modelFisionomia = Fisionomia::find()
                            ->where(['cedula_id' => $id])->one();

        $modelUniforme = Uniforme::find()
                            ->where(['cedula_id' => $id])->one();

        $modelCaptador = Captador::find()
                            ->where(['captado' => $id])->one();

        if (!$modelFamiliares) {
            // throw new NotFoundHttpException('Datos familiares not found');
          echo "Datos familiares no encontrada";
        }

        if (!$modelSociologico) {
            // throw new NotFoundHttpException('Datos familiares not found');
          echo "Datos sociológicos no encontrada";
        }

        if (!$modelFisionomia) {
            // throw new NotFoundHttpException('Datos familiares not found');
          echo "Fisionomía del Personal no encontrada";
        }

        if (!$modelUniforme) {
            // throw new NotFoundHttpException('Datos familiares not found');
          echo "Unidad de Batallón al cual se asigno el Personal no encontrada";
        }

        return $this->render('detalles', [
            'modelPersona' => $modelPersona,
            'modelFamiliares' => $modelFamiliares,
            'modelSociologico' => $modelSociologico,
            'modelFisionomia' => $modelFisionomia,
            'modelUniforme' => $modelUniforme,
            'modelCaptador' => $modelCaptador,
    ]);

    }

    /**
     * Crea un nuevo registro para el modelo Persona.
     * Si la creación del registro es exitosa, el navegador será redirigido a la página de 'view'.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persona();

        $estados = Estados::find()->all();
        $municipios = [];
        $parroquias = [];
        $ciudades = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cedula]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'estados' => $estados,
                'municipios' => $municipios,
                'parroquias' => $parroquias,
                'ciudades' => $ciudades,
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
     * Actualiza un registro existente del modelo Persona.
     * Si la actualización del registro es exitosa, el navegador será redirigido a la página de 'view'.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $estados = Estados::find()->orderBy('estado')->all();
        // $municipios = Municipios::find()->orderBy('municipio')->all();
        // $parroquias = Parroquias::find()->orderBy('parroquia')->all();
        // $ciudades = Ciudades::find()->orderBy('ciudad')->all();
        $municipios = [];
        $parroquias = [];
        $ciudades = [];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->cedula]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'estados' => $estados,
                'municipios' => $municipios,
                'parroquias' => $parroquias,
                'ciudades' => $ciudades,
            ]);
        }
    }

    /**
     * Elimina un registro existente del modelo Persona.
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

    /*
    SELECT *
    FROM ciudades ciu
    JOIN estados edo ON edo.id_estado = ciu.id_estado
    WHERE edo.id_estado = ciu.id_estado
    ORDER BY `edo`.`id_estado` ASC
    */

    /**
      * LJCG
      * Buscar los registros de Ciudades basado en el valor id_estado.
      * @param integer $id
      * @return Data en formato JSON de los Ciudades si es exitosa
    */
    public function actionAjaxCiudad($id_estado)
    {
        if (Yii::$app->request->isAjax)
        {
            if (($model = Ciudades::find() // SELECT * FROM ciudades WHERE id_estado = 19
                            ->where(['id_estado' => $id_estado])->all()) !== null) {
                if (count($model) > 0) {
                    foreach($model as $ciudad)
                    {
                        echo '<option value="'.$ciudad->id_ciudad.'">'.$ciudad->ciudad.'</option>';
                    }
                } else {
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
      * Buscar los registros de Municipios basado en el valor id_estado.
      * @param integer $id
      * @return Data en formato JSON de los Municipios si es exitosa
    */
    public function actionAjaxMunicipio($id_estado)
    {
        if (Yii::$app->request->isAjax)
        {
            if (($model = Municipios::find()
                            ->where(['id_estado' => $id_estado])->all()) !== null) {
                if (count($model) > 0)
                {
                    foreach($model as $municipio) {
                        echo '<option value="'.$municipio->id_municipio.'">'.$municipio->municipio.'</option>';
                    }
                } else {
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
      * Buscar los registros de Parroquias basado en el valor id_municipio.
      * @param integer $id
      * @return Data en formato JSON de los Parroquias si es exitosa
    */
    public function actionAjaxParroquia($id_municipio)
    {
        if (Yii::$app->request->isAjax)
        {
            if (($model = Parroquias::find()
                            ->where(['id_municipio' => $id_municipio])->all()) !== null) {
                if (count($model) > 0) {
                    foreach($model as $parroquia)
                    {
                        echo '<option value="'.$parroquia->id_parroquia.'">'.$parroquia->parroquia.'</option>';
                    }
                } else {
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
     * Busca el modelo Persona basado en su valor de clave principal.
     * Si no se encuentra el modelo, se produce una excepción HTTP 404.
     * @param integer $id
     * @return Persona el modelo cargado
     * @throws NotFoundHttpException si no se encuentra el modelo
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
