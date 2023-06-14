<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nav_dropdown".
 *
 * @property int $id
 * @property string $item_text
 * @property string|null $item_link
 * @property int|null $item_page_id
 * @property int|null $nav_item_id
 * @property int $number
 *
 * @property Page $itemPage
 * @property NavbarItem $navItem
 */
class NavDropdown extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nav_dropdown';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_text'], 'required'],
            [['item_page_id', 'nav_item_id', 'number'], 'integer'],
            [['item_text', 'item_link'], 'string', 'max' => 255],
            [['item_page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::class, 'targetAttribute' => ['item_page_id' => 'id']],
            [['nav_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => NavbarItem::class, 'targetAttribute' => ['nav_item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_text' => 'Item Text',
            'item_link' => 'Item Link',
            'item_page_id' => 'Item Page ID',
            'nav_item_id' => 'Nav Item ID',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[ItemPage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItemPage()
    {
        return $this->hasOne(Page::class, ['id' => 'item_page_id']);
    }

    /**
     * Gets query for [[NavItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNavItem()
    {
        return $this->hasOne(NavbarItem::class, ['id' => 'nav_item_id']);
    }
}
