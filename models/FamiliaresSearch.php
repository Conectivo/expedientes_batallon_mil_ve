<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Familiares;

/**
 * FamiliaresSearch represents the model behind the search form about `app\models\Familiares`.
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
        $query = Familiares::find();

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
            'cantidad_hijos' => $this->cantidad_hijos,
        ]);

        $query->andFilterWhere(['like', 'nombre_madre', $this->nombre_madre])
            ->andFilterWhere(['like', 'nombre_padre', $this->nombre_padre])
            ->andFilterWhere(['like', 'nombre_conyugue', $this->nombre_conyugue])
            ->andFilterWhere(['like', 'sit_padres', $this->sit_padres]);

        return $dataProvider;
    }
}
