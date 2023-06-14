<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_text_3_1".
 *
 * @property int $id
 * @property string|null $main_title
 * @property string|null $second_title_1
 * @property string|null $second_title_2
 * @property string|null $second_title_3
 * @property string|null $text1
 * @property string|null $text2
 * @property string|null $text3
 * @property string|null $main_title_color
 * @property string|null $second_title_color
 * @property string|null $text_color
 * @property int|null $block_margin_top
 * @property int|null $block_margin_bottom
 *
 * @property PageHasBlock[] $pageHasBlocks
 */
class BlockText31 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_text_3_1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_margin_top', 'block_margin_bottom'], 'integer'],
            [['main_title', 'second_title_1', 'second_title_2', 'second_title_3', 'main_title_color', 'second_title_color', 'text_color'], 'string', 'max' => 255],
            [['text1', 'text2', 'text3'], 'string', 'max' => 2000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_title' => 'Текст главного заголовка',
            'second_title_1' => 'Текст первого заголовка',
            'second_title_2' => 'Текст второго заголовка',
            'second_title_3' => 'Текст третьего заголовка',
            'text1' => 'Текст в первой колонке',
            'text2' => 'Текст во второй колонке',
            'text3' => 'Текст в третьей колонке',
            'main_title_color' => 'Цвет главного заголовка',
            'second_title_color' => 'Цвет второго заголовка',
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
        return $this->hasMany(PageHasBlock::class, ['text_3_1_block_id' => 'id']);
    }
}
