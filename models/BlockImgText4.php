<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_img_text_4".
 *
 * @property int $id
 * @property string|null $img1
 * @property string|null $img2
 * @property int|null $img_orientation
 * @property string|null $title
 * @property string|null $title2
 * @property string|null $text
 * @property string|null $text2
 * @property string|null $button_text1
 * @property string|null $button_text2
 * @property string|null $button_link1
 * @property string|null $button_link2
 * @property string|null $button_text_color
 * @property string|null $button_bg_color
 * @property string $title_color
 * @property string $text_color
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 *
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockImgText4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_img_text_4';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_orientation', 'block_margin_top', 'block_margin_bottom'], 'integer'],
            [['img1', 'img2', 'title', 'title2', 'button_text1', 'button_text2', 'button_link1', 'button_link2', 'button_text_color', 'button_bg_color', 'title_color', 'text_color'], 'string', 'max' => 255],
            [['text', 'text2'], 'string', 'max' => 6000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img1' => 'Картинка 1',
            'img2' => 'Картинка 2',
            'img_orientation' => 'Ориентация картинки',
            'title' => 'Заголовок 1',
            'title2' => 'Заголовок 2',
            'text' => 'Текст 1',
            'text2' => 'Текст 2',
            'button_text1' => 'Текст кнопки 1',
            'button_text2' => 'Текст кнопки 2',
            'button_link1' => 'Ссылка кнопки 1',
            'button_link2' => 'Ссылка кнопки 2',
            'button_text_color' => 'Цвет текста кнопки',
            'button_bg_color' => 'Цвет кнопки',
            'title_color' => 'Цвет заголовка',
            'text_color' => 'Цвет текста',
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
        return $this->hasMany(PageHasBlock::class, ['img_text_4_block' => 'id']);
    }
}
