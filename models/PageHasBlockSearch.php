<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PageHasBlock;

/**
 * PageHasBlockSearch represents the model behind the search form of `app\models\PageHasBlock`.
 */
class PageHasBlockSearch extends PageHasBlock
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'page_id', 'cover_block_id', 'title_block_id', 'text_block_id', 'text_3_1_block_id', 'text_3_2_block_id', 'text_2_1_block_id', 'text_2_2_block_id', 'img_block_id', 'img_text_1_block', 'img_text_2_block', 'img_text_3_block', 'img_text_4_block', 'gallery_block_id', 'video_block', 'slider_block', 'number'], 'integer'],
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
        $query = PageHasBlock::find();

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
            'page_id' => $this->page_id,
            'cover_block_id' => $this->cover_block_id,
            'title_block_id' => $this->title_block_id,
            'text_block_id' => $this->text_block_id,
            'text_3_1_block_id' => $this->text_3_1_block_id,
            'text_3_2_block_id' => $this->text_3_2_block_id,
            'text_2_1_block_id' => $this->text_2_1_block_id,
            'text_2_2_block_id' => $this->text_2_2_block_id,
            'img_block_id' => $this->img_block_id,
            'img_text_1_block' => $this->img_text_1_block,
            'img_text_2_block' => $this->img_text_2_block,
            'img_text_3_block' => $this->img_text_3_block,
            'img_text_4_block' => $this->img_text_4_block,
            'gallery_block_id' => $this->gallery_block_id,
            'video_block' => $this->video_block,
            'slider_block' => $this->slider_block,
            'number' => $this->number,
        ]);

        return $dataProvider;
    }
}
