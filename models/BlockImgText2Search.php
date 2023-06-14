<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BlockImgText2;

/**
 * BlockImgText2Search represents the model behind the search form of `app\models\BlockImgText2`.
 */
class BlockImgText2Search extends BlockImgText2
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'block_margin_top', 'block_margin_bottom'], 'integer'],
            [['img1', 'img2', 'title', 'title2', 'text', 'text2', 'title_color', 'text_color'], 'safe'],
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
        $query = BlockImgText2::find();

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

        $query->andFilterWhere(['like', 'img1', $this->img1])
            ->andFilterWhere(['like', 'img2', $this->img2])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'title2', $this->title2])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'text2', $this->text2])
            ->andFilterWhere(['like', 'title_color', $this->title_color])
            ->andFilterWhere(['like', 'text_color', $this->text_color]);

        return $dataProvider;
    }
}
