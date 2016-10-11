<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Captador;

/**
 * CaptadorSearch representa el modelo detrás del formulario de búsqueda de `app\models\Captador`.
 */
class CaptadorSearch extends Captador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jquia', 'cedula', 'captado'], 'integer'],
            [['nombre_completo', 'telefono'], 'safe'],
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
        $query = Captador::find();

        // añadir condiciones que siempre debe aplicarse aquí...

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
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
            'id' => $this->id,
            'jquia' => $this->jquia,
            'cedula' => $this->cedula,
            'captado' => $this->captado,
        ]);

        $query->andFilterWhere(['like', 'nombre_completo', $this->nombre_completo])
            ->andFilterWhere(['like', 'telefono', $this->telefono]);

        return $dataProvider;
    }
}
