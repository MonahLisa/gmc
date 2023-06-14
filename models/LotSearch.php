<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lot;

/**
 * LotSearch represents the model behind the search form of `app\models\Lot`.
 */
class LotSearch extends Lot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unit_measurement_id', 'quantity', 'cost_per_unit', 'cost'], 'integer'],
            [['name', 'ACTEA2', 'ACPA2'], 'safe'],
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
        $query = Lot::find();

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
            'unit_measurement_id' => $this->unit_measurement_id,
            'quantity' => $this->quantity,
            'cost_per_unit' => $this->cost_per_unit,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'ACTEA2', $this->ACTEA2])
            ->andFilterWhere(['like', 'ACPA2', $this->ACPA2]);

        return $dataProvider;
    }
}
