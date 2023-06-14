<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_accordion_item_content".
 *
 * @property int $id
 * @property string|null $doc_text
 * @property int|null $doc_id
 * @property string|null $item_text
 * @property int $block_accordion_item_id
 *
 * @property BlockAccordionItem $blockAccordionItem
 * @property Docs $doc
 */
class BlockAccordionItemContent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_accordion_item_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_id', 'block_accordion_item_id'], 'integer'],
            [['block_accordion_item_id'], 'required'],
            [['doc_text'], 'string', 'max' => 255],
            [['item_text'], 'string', 'max' => 800],
            [['block_accordion_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockAccordionItem::class, 'targetAttribute' => ['block_accordion_item_id' => 'id']],
            [['doc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docs::class, 'targetAttribute' => ['doc_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doc_text' => 'Doc Text',
            'doc_id' => 'Doc ID',
            'item_text' => 'Item Text',
            'block_accordion_item_id' => 'Block Accordion Item ID',
        ];
    }

    /**
     * Gets query for [[BlockAccordionItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlockAccordionItem()
    {
        return $this->hasOne(BlockAccordionItem::class, ['id' => 'block_accordion_item_id']);
    }

    /**
     * Gets query for [[Doc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoc()
    {
        return $this->hasOne(Docs::class, ['id' => 'doc_id']);
    }
}
