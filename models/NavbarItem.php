<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "navbar_item".
 *
 * @property int $id
 * @property string|null $nav_item_text
 * @property string|null $nav_item_link
 * @property int|null $nav_item_page_id
 * @property string|null $dropdown_text
 * @property int $number
 *
 * @property NavDropdown[] $navDropdowns
 * @property Page $navItemPage
 */
class NavbarItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'navbar_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nav_item_page_id', 'number'], 'integer'],
            [['nav_item_text', 'nav_item_link', 'dropdown_text'], 'string', 'max' => 255],
            [['nav_item_page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::class, 'targetAttribute' => ['nav_item_page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nav_item_text' => 'Текст пункта меню',
            'nav_item_link' => 'Ссылка страницы пункта меню',
            'nav_item_page_id' => 'Страница пункта меню',
            'dropdown_text' => 'Текст выпадающего списка пунктов меню',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[NavDropdowns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNavDropdowns()
    {
        return $this->hasMany(NavDropdown::class, ['nav_item_id' => 'id']);
    }

    /**
     * Gets query for [[NavItemPage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNavItemPage()
    {
        return $this->hasOne(Page::class, ['id' => 'nav_item_page_id']);
    }
}
