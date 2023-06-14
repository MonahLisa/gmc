<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_has_doc".
 *
 * @property int $id
 * @property int $news_id
 * @property int $doc_id
 * @property int|null $main
 *
 * @property Docs $doc
 * @property News $news
 */
class NewsHasDoc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_has_doc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'doc_id'], 'required'],
            [['news_id', 'doc_id', 'main'], 'integer'],
            [['news_id'], 'exist', 'skipOnError' => true, 'targetClass' => News::class, 'targetAttribute' => ['news_id' => 'id']],
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
            'news_id' => 'News ID',
            'doc_id' => 'Doc ID',
            'main' => 'Main',
        ];
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

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(News::class, ['id' => 'news_id']);
    }
}
