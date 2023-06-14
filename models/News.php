<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Message[] $messages
 * @property NewsHasDoc[] $newsHasDocs
 * @property NewsHasNotification[] $newsHasNotifications
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

//    public function behaviors()
//    {
//        return [
//            TimestampBehavior::className(),
//            [
//                'class' => TimestampBehavior::class,
//                'updatedAtAttribute' => 'updated_at',
//                'value' => new Expression('NOW()'),
//            ],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'created_at' => 'Дата',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::class, ['news_id' => 'id']);
    }

    /**
     * Gets query for [[NewsHasDocs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsHasDocs()
    {
        return $this->hasMany(NewsHasDoc::class, ['news_id' => 'id']);
    }

    /**
     * Gets query for [[NewsHasNotifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsHasNotifications()
    {
        return $this->hasMany(NewsHasNotification::class, ['news_id' => 'id']);
    }
}
