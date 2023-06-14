<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_accordion".
 *
 * @property int $id
 * @property int $block_margin_top
 * @property int $block_margin_bottom
 *
 * @property BlockAccordionItem[] $blockAccordionItems
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockAccordion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_accordion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_margin_top', 'block_margin_bottom'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_margin_top' => 'Block Margin Top',
            'block_margin_bottom' => 'Block Margin Bottom',
        ];
    }

    /**
     * Gets query for [[BlockAccordionItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlockAccordionItems()
    {
        return $this->hasMany(BlockAccordionItem::class, ['block_accordion_id' => 'id']);
    }

    /**
     * Gets query for [[PageHasBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasBlocks()
    {
        return $this->hasMany(PageHasBlock::class, ['accordion_id' => 'id']);
    }
}
