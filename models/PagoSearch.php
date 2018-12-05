<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pago;

/**
 * PagoSearch represents the model behind the search form of `app\models\Pago`.
 */
class PagoSearch extends Pago
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user', 'servicioxdia', 'plan', 'metodo', 'verificado'], 'integer'],
            [['fecha_pago', 'plandia', 'descripcion', 'extratransferencia'], 'safe'],
            [['monto'], 'number'],
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
        $query = Pago::find();

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
            'fecha_pago' => $this->fecha_pago,
            'user' => $this->user,
            'servicioxdia' => $this->servicioxdia,
            'plan' => $this->plan,
            'plandia' => $this->plandia,
            'monto' => $this->monto,
            'metodo' => $this->metodo,
            'verificado' => $this->verificado,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'extratransferencia', $this->extratransferencia]);

        return $dataProvider;
    }
}
