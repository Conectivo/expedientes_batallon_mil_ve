<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Uniforme;

/**
 * UniformeSearch represents the model behind the search form about `app\models\Uniforme`.
 */
class UniformeSearch extends Uniforme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula_id', 'gorra', 'calzado'], 'integer'],
            [['tipo_talla'], 'safe'],
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
        $query = Uniforme::find();

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
            'gorra' => $this->gorra,
            'calzado' => $this->calzado,
        ]);

        $query->andFilterWhere(['like', 'tipo_talla', $this->tipo_talla]);

        return $dataProvider;
    }
}
