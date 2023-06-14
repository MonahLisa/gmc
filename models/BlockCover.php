<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_cover".
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $title
 * @property string|null $text
 * @property string|null $button_text
 * @property string|null $button_link
 * @property string|null $button_bg_color
 * @property string|null $button_text_color
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 * @property string|null $title_color
 * @property string|null $text_color
 *
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockCover extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_cover';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_margin_top', 'block_margin_bottom'], 'integer'],
            [['img', 'title', 'button_text', 'button_link', 'button_bg_color', 'button_text_color', 'title_color', 'text_color'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 6000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'title' => 'Title',
            'text' => 'Text',
            'button_text' => 'Button Text',
            'button_link' => 'Button Link',
            'button_bg_color' => 'Button Bg Color',
            'button_text_color' => 'Button Text Color',
            'block_margin_top' => 'Block Margin Top',
            'block_margin_bottom' => 'Block Margin Bottom',
            'title_color' => 'Title Color',
            'text_color' => 'Text Color',
        ];
    }

    /**
     * Gets query for [[PageHasBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasBlocks()
    {
        return $this->hasMany(PageHasBlock::class, ['cover_block_id' => 'id']);
    }
}
