<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plane;

/**
 * PlaneSearch represents the model behind the search form of `app\models\Plane`.
 */
class PlaneSearch extends Plane
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'servicio', 'user', 'trabajador', 'direccion'], 'integer'],
            [['semanal', 'fecha_inicia', 'fecha_creacion', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'timepo'], 'safe'],
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
        $query = Plane::find();

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
            'servicio' => $this->servicio,
            'user' => $this->user,
            'trabajador' => $this->trabajador,
            'fecha_inicia' => $this->fecha_inicia,
            'fecha_creacion' => $this->fecha_creacion,
            'direccion' => $this->direccion,
        ]);

        $query->andFilterWhere(['like', 'semanal', $this->semanal])
            ->andFilterWhere(['like', 'lunes', $this->lunes])
            ->andFilterWhere(['like', 'martes', $this->martes])
            ->andFilterWhere(['like', 'miercoles', $this->miercoles])
            ->andFilterWhere(['like', 'jueves', $this->jueves])
            ->andFilterWhere(['like', 'viernes', $this->viernes])
            ->andFilterWhere(['like', 'sabado', $this->sabado])
            ->andFilterWhere(['like', 'domingo', $this->domingo])
            ->andFilterWhere(['like', 'timepo', $this->timepo]);

        return $dataProvider;
    }
}
