<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sociologico;

/**
 * SociologicoSearch represents the model behind the search form about `app\models\Sociologico`.
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
        $query = Sociologico::find();

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
        ]);

        $query->andFilterWhere(['like', 'grado', $this->grado])
            ->andFilterWhere(['like', 'profesion', $this->profesion])
            ->andFilterWhere(['like', 'vivienda', $this->vivienda]);

        return $dataProvider;
    }
}
