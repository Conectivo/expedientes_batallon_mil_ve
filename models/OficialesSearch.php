<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oficiales;

/**
 * OficialesSearch representa el modelo detrás del formulario de búsqueda de `app\models\Oficiales`.
 */
class OficialesSearch extends Oficiales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jquia_id', 'cedula', 'situacion'], 'integer'],
            [['nombres', 'apellidos', 'sexo', 'email', 'arma', 'cargo', 'direccion', 'telefono', 'direccion_emergencia', 'telefonos_emergencia'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass la implementación de scenarios() en la clase padre
        return Model::scenarios();
    }

    /**
     * Crea una instancia de proveedor de datos con la consulta de búsqueda aplicada
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Oficiales::find();

        // añadir condiciones que siempre debe aplicarse aquí...

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'cedula' => SORT_ASC,
                    //'jquia_id' => SORT_ASC
                ],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // descomente la siguiente línea si no desea devolver cualquier registro cuando falla la validación
            // $query->where('0=1');
            return $dataProvider;
        }

        // condiciones de filtrado del objeto GridView
        $query->andFilterWhere([
            'id' => $this->id,
            'jquia_id' => $this->jquia_id,
            'cedula' => $this->cedula,
            'sexo' => $this->sexo,
            'situacion' => $this->situacion,
        ]);

        $query->andFilterWhere(['like', 'jquia_id', $this->jquia_id])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'arma', $this->arma])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'direccion_emergencia', $this->direccion_emergencia])
            ->andFilterWhere(['like', 'telefonos_emergencia', $this->telefonos_emergencia]);

        return $dataProvider;
    }
}
