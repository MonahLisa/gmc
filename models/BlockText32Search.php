<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BlockText32;

/**
 * BlockText32Search represents the model behind the search form of `app\models\BlockText32`.
 */
class BlockText32Search extends BlockText32
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'block_margin_top', 'block_margin_bottom'], 'integer'],
            [['main_title', 'second_title_1', 'second_title_2', 'second_title_3', 'second_title_4', 'second_title_5', 'second_title_6', 'text1', 'text2', 'text3', 'text4', 'text5', 'text6', 'main_title_color', 'second_title_color', 'text_color'], 'safe'],
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
        $query = BlockText32::find();

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
            'block_margin_top' => $this->block_margin_top,
            'block_margin_bottom' => $this->block_margin_bottom,
        ]);

        $query->andFilterWhere(['like', 'main_title', $this->main_title])
            ->andFilterWhere(['like', 'second_title_1', $this->second_title_1])
            ->andFilterWhere(['like', 'second_title_2', $this->second_title_2])
            ->andFilterWhere(['like', 'second_title_3', $this->second_title_3])
            ->andFilterWhere(['like', 'second_title_4', $this->second_title_4])
            ->andFilterWhere(['like', 'second_title_5', $this->second_title_5])
            ->andFilterWhere(['like', 'second_title_6', $this->second_title_6])
            ->andFilterWhere(['like', 'text1', $this->text1])
            ->andFilterWhere(['like', 'text2', $this->text2])
            ->andFilterWhere(['like', 'text3', $this->text3])
            ->andFilterWhere(['like', 'text4', $this->text4])
            ->andFilterWhere(['like', 'text5', $this->text5])
            ->andFilterWhere(['like', 'text6', $this->text6])
            ->andFilterWhere(['like', 'main_title_color', $this->main_title_color])
            ->andFilterWhere(['like', 'second_title_color', $this->second_title_color])
            ->andFilterWhere(['like', 'text_color', $this->text_color]);

        return $dataProvider;
    }
}
