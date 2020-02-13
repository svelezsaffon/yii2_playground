<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Costos;

/**
 * CostosSearch represents the model behind the search form of `app\models\Costos`.
 */
class CostosSearch extends Costos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['servicio', 'ciudad', 'horario', 'id'], 'integer'],
            [['valor'], 'number'],
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
        $query = Costos::find();

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
            'servicio' => $this->servicio,
            'ciudad' => $this->ciudad,
            'horario' => $this->horario,
            'valor' => $this->valor,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
