<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NavDropdown;

/**
 * NavDropdownSearch represents the model behind the search form of `app\models\NavDropdown`.
 */
class NavDropdownSearch extends NavDropdown
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'item_page_id', 'nav_item_id', 'number'], 'integer'],
            [['item_text', 'item_link'], 'safe'],
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
        $query = NavDropdown::find();

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
            'item_page_id' => $this->item_page_id,
            'nav_item_id' => $this->nav_item_id,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'item_text', $this->item_text])
            ->andFilterWhere(['like', 'item_link', $this->item_link]);

        return $dataProvider;
    }
}
