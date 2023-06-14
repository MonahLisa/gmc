<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification_document".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $notification_id
 *
 * @property Notification $notification
 */
class NotificationDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'url', 'notification_id'], 'required'],
            [['notification_id'], 'integer'],
            [['title', 'url'], 'string', 'max' => 255],
            [['notification_id'], 'exist', 'skipOnError' => true, 'targetClass' => Notification::class, 'targetAttribute' => ['notification_id' => 'id']],
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
            'url' => 'Url',
            'notification_id' => 'Notification ID',
        ];
    }

    /**
     * Gets query for [[Notification]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotification()
    {
        return $this->hasOne(Notification::class, ['id' => 'notification_id']);
    }
}
