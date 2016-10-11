<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Familiares;

/**
 * FamiliaresSearch representa el modelo detrás del formulario de búsqueda de `app\models\Familiares`.
 */
class FamiliaresSearch extends Familiares
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id', 'cantidad_hijos'], 'integer'],
            [['nombre_madre', 'nombre_padre', 'nombre_conyugue', 'sit_padres'], 'safe'],
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
        $query = Familiares::find();

        // añadir condiciones que siempre debe aplicarse aquí...

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'cedula_id' => SORT_ASC
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
            'cedula_id' => $this->cedula_id,
            'cantidad_hijos' => $this->cantidad_hijos,
        ]);

        $query->andFilterWhere(['like', 'nombre_madre', $this->nombre_madre])
            ->andFilterWhere(['like', 'nombre_padre', $this->nombre_padre])
            ->andFilterWhere(['like', 'nombre_conyugue', $this->nombre_conyugue])
            ->andFilterWhere(['like', 'sit_padres', $this->sit_padres]);

        return $dataProvider;
    }
}
