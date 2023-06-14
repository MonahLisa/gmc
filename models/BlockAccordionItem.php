<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_accordion_item".
 *
 * @property int $id
 * @property string $title
 * @property int $block_accordion_id
 *
 * @property BlockAccordion $blockAccordion
 * @property BlockAccordionItemContent[] $blockAccordionItemContents
 */
class BlockAccordionItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_accordion_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_accordion_id'], 'required'],
            [['block_accordion_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['block_accordion_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockAccordion::class, 'targetAttribute' => ['block_accordion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'block_accordion_id' => 'Block Accordion ID',
        ];
    }

    /**
     * Gets query for [[BlockAccordion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlockAccordion()
    {
        return $this->hasOne(BlockAccordion::class, ['id' => 'block_accordion_id']);
    }

    /**
     * Gets query for [[BlockAccordionItemContents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlockAccordionItemContents()
    {
        return $this->hasMany(BlockAccordionItemContent::class, ['block_accordion_item_id' => 'id']);
    }
}
