<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docs".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $doc
 * @property int|null $category_id
 */
class Docs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 600],
            [['doc'], 'file', 'extensions'=>['pdf', 'docx', 'doc'], 'maxSize'=>18485760],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'doc' => 'Документ',
            'category_id' => 'Категория',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(DocumentCategory::class, ['id' => 'category_id']);
    }
}
