<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sociologico;

/**
 * SociologicoSearch representa el modelo detrás del formulario de búsqueda de `app\models\Sociologico`.
 */
class SociologicoSearch extends Sociologico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id'], 'integer'],
            [['grado', 'profesion', 'vivienda'], 'safe'],
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
        $query = Sociologico::find();

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
        ]);

        $query->andFilterWhere(['like', 'grado', $this->grado])
            ->andFilterWhere(['like', 'profesion', $this->profesion])
            ->andFilterWhere(['like', 'vivienda', $this->vivienda]);

        return $dataProvider;
    }
}
