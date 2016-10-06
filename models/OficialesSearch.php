<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Oficiales;

/**
 * OficialesSearch represents the model behind the search form about `app\models\Oficiales`.
 */
class OficialesSearch extends Oficiales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cedula', 'telefono', 'telefonos_emergencia'], 'integer'],
            [['jquia', 'nombres', 'apellido', 'situacion', 'email', 'arma', 'cargo', 'direccion', 'direccion_emergencia'], 'safe'],
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
        $query = Oficiales::find();

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
            'id' => $this->id,
            'cedula' => $this->cedula,
            'telefono' => $this->telefono,
            'telefonos_emergencia' => $this->telefonos_emergencia,
        ]);

        $query->andFilterWhere(['like', 'jquia', $this->jquia])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'situacion', $this->situacion])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'arma', $this->arma])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'direccion_emergencia', $this->direccion_emergencia]);

        return $dataProvider;
    }
}
