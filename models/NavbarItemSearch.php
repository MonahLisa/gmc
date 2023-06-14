<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NavbarItem;

/**
 * NavbarItemSearch represents the model behind the search form of `app\models\NavbarItem`.
 */
class NavbarItemSearch extends NavbarItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nav_item_page_id', 'number'], 'integer'],
            [['nav_item_text', 'nav_item_link', 'dropdown_text'], 'safe'],
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
        $query = NavbarItem::find();

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
            'nav_item_page_id' => $this->nav_item_page_id,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['like', 'nav_item_text', $this->nav_item_text])
            ->andFilterWhere(['like', 'nav_item_link', $this->nav_item_link])
            ->andFilterWhere(['like', 'dropdown_text', $this->dropdown_text]);

        return $dataProvider;
    }
}
