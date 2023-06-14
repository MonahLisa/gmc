<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BlockImgText1;

/**
 * BlockImgText1Search represents the model behind the search form of `app\models\BlockImgText1`.
 */
class BlockImgText1Search extends BlockImgText1
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'img_orientation', 'block_margin_top', 'block_margin_bottom'], 'integer'],
            [['img', 'title', 'text', 'title_color', 'text_color'], 'safe'],
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
        $query = BlockImgText1::find();

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
            'img_orientation' => $this->img_orientation,
            'block_margin_top' => $this->block_margin_top,
            'block_margin_bottom' => $this->block_margin_bottom,
        ]);

        $query->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'title_color', $this->title_color])
            ->andFilterWhere(['like', 'text_color', $this->text_color]);

        return $dataProvider;
    }
}
