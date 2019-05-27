<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Viviendas;

/**
 * ViviendasSearch represents the model behind the search form of `app\models\Viviendas`.
 */
class ViviendasSearch extends Viviendas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'propietario_id', 'num_habitaciones'], 'integer'],
            [['direccion', 'localidad'], 'safe'],
            [['precio', 'area'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Viviendas::find();

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
            'propietario_id' => $this->propietario_id,
            'precio' => $this->precio,
            'num_habitaciones' => $this->num_habitaciones,
            'area' => $this->area,
        ]);

        $query->andFilterWhere(['ilike', 'direccion', $this->direccion])
            ->andFilterWhere(['ilike', 'localidad', $this->localidad]);

        return $dataProvider;
    }
}
