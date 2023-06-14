<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_img".
 *
 * @property int $id
 * @property string|null $img
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 *
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockImg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_margin_top', 'block_margin_bottom'], 'integer'],
            ['img', 'image', 'extensions'=>['png', 'jpg', 'jpeg', 'gif', 'JPG', 'JPEG'], 'maxSize'=>10485760],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Картинка',
            'block_margin_top' => 'Отступ сверху (от 0 до 50)',
            'block_margin_bottom' => 'Отступ снизу (от 0 до 50)',
        ];
    }

    /**
     * Gets query for [[PageHasBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasBlocks()
    {
        return $this->hasMany(PageHasBlock::class, ['img_block_id' => 'id']);
    }
}
