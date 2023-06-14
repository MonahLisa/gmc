<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_img_text_2".
 *
 * @property int $id
 * @property string|null $img1
 * @property string|null $img2
 * @property string|null $title
 * @property string|null $title2
 * @property string|null $text
 * @property string|null $text2
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 * @property string|null $title_color
 * @property string|null $text_color
 *
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockImgText2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_img_text_2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_margin_top', 'block_margin_bottom'], 'integer'],
            [['title', 'title2', 'title_color', 'text_color'], 'string', 'max' => 255],
            [['text', 'text2'], 'string', 'max' => 6000],
            [['img1', 'img2'], 'image', 'extensions'=>['png', 'jpg', 'jpeg', 'gif', 'JPG', 'JPEG'], 'maxSize'=>10485760],

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
            'title' => 'Заголовок 1',
            'title2' => 'Заголовок 2',
            'text' => 'Текст 1',
            'text2' => 'Текст 2',
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
        return $this->hasMany(PageHasBlock::class, ['img_text_2_block' => 'id']);
    }
}
