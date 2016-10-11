<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Persona;

/**
 * PersonaSearch representa el modelo detrás del formulario de búsqueda de `app\models\Persona`.
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
        $query = Persona::find();

        // añadir condiciones que siempre debe aplicarse aquí...

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    // '' => SORT_ASC,
                    // '' => SORT_DESC
                    'cedula' => SORT_ASC
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
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'telefono_movil', $this->telefono_movil])
            ->andFilterWhere(['like', 'estado_civil', $this->estado_civil])
            ->andFilterWhere(['like', 'modalidad', $this->modalidad]);
            // ->andFilterWhere(['like', 'fecha_ingreso', $this->fecha_ingreso]);

        return $dataProvider;
    }
}
