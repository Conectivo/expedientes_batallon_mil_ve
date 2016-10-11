<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fisionomia;

/**
 * FisionomiaSearch representa el modelo detrás del formulario de búsqueda de `app\models\Fisionomia`.
 */
class FisionomiaSearch extends Fisionomia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id', 'grupo_sanguineo'], 'integer'],
            [['color_piel', 'color_cabello', 'color_ojos', 'contextura', 'condicion_fisica', 'condicion_intelectual', 'estatura', 'senales_particulares'], 'safe'],
            [['peso'], 'number'],
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
        $query = Fisionomia::find();

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
            'estatura' => $this->estatura,
            'peso' => $this->peso,
            'grupo_sanguineo' => $this->grupo_sanguineo,
        ]);

        $query->andFilterWhere(['like', 'color_piel', $this->color_piel])
            ->andFilterWhere(['like', 'color_cabello', $this->color_cabello])
            ->andFilterWhere(['like', 'color_ojos', $this->color_ojos])
            ->andFilterWhere(['like', 'contextura', $this->contextura])
            ->andFilterWhere(['like', 'condicion_fisica', $this->condicion_fisica])
            ->andFilterWhere(['like', 'condicion_intelectual', $this->condicion_intelectual])
            ->andFilterWhere(['like', 'senales_particulares', $this->senales_particulares]);

        return $dataProvider;
    }
}
