<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_img_text_1".
 *
 * @property int $id
 * @property string|null $img
 * @property string|null $title
 * @property string|null $text
 * @property int|null $img_orientation
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 * @property string|null $title_color
 * @property string|null $text_color
 *
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockImgText1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_img_text_1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_orientation', 'block_margin_top', 'block_margin_bottom'], 'integer'],
            [['title', 'title_color', 'text_color'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 6000],
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
            'title' => 'Заголовок',
            'text' => 'Текст',
            'img_orientation' => 'Ориентация картинки',
            'block_margin_top' => 'Отступ сверху (от 0 до 50)',
            'block_margin_bottom' => 'Отступ снизу (от 0 до 50)',
            'title_color' => 'Цвет заголовка',
            'text_color' => 'Цвет текста',
        ];
    }

    /**
     * Gets query for [[PageHasBlocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPageHasBlocks()
    {
        return $this->hasMany(PageHasBlock::class, ['img_text_1_block' => 'id']);
    }
}
