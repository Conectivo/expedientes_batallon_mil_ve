<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch represents the model behind the search form about `app\models\Persona`.
 */
class PersonaSearch extends Persona
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'lugar_nacimiento', 'direccion', 'telefono_movil', 'religion', 'estado_civil', 'unidad_id'], 'integer'],
            [['nombres', 'apellidos', 'fecha_nacimiento', 'sector', 'modalidad', 'fecha_ingreso'], 'safe'],
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
        $query = Persona::find();

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
            'cedula' => $this->cedula,
            'lugar_nacimiento' => $this->lugar_nacimiento,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'direccion' => $this->direccion,
            'telefono_movil' => $this->telefono_movil,
            'religion' => $this->religion,
            'estado_civil' => $this->estado_civil,
            'modalidad' => $this->modalidad,
            'fecha_ingreso' => $this->fecha_ingreso,
            'unidad_id' => $this->unidad_id,
        ]);

        $query->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'estado_civil', $this->estado_civil])
            ->andFilterWhere(['like', 'modalidad', $this->modalidad]);
            // ->andFilterWhere(['like', 'fecha_ingreso', $this->fecha_ingreso]);

        return $dataProvider;
    }
}
