<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fisionomia;

/**
 * FisionomiaSearch represents the model behind the search form about `app\models\Fisionomia`.
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
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Fisionomia::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
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
