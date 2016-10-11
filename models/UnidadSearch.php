<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidad;

/**
 * UnidadSearch representa el modelo detrás del formulario de búsqueda de `app\models\Unidad`.
 */
class UnidadSearch extends Unidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['unidad'], 'safe'],
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
        $query = Unidad::find();

        // añadir condiciones que siempre debe aplicarse aquí...

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'unidad' => SORT_ASC
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
            // 'unidad' => $this->unidad,
        ]);

        $query->andFilterWhere(['like', 'unidad', $this->unidad]);

        return $dataProvider;
    }
}
