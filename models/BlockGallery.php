<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_gallery".
 *
 * @property int $id
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 *
 * @property BlockGalleryHasImage[] $blockGalleryHasImages
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_gallery';
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
     * Gets query for [[BlockGalleryHasImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlockGalleryHasImages()
    {
        return $this->hasMany(BlockGalleryHasImage::class, ['block_gallery_id' => 'id']);
    }

    /**
     * Gets query for [[PageHasBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasBlocks()
    {
        return $this->hasMany(PageHasBlock::class, ['gallery_block_id' => 'id']);
    }
}
