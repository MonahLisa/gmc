<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "block_gallery_has_image".
 *
 * @property int $id
 * @property int $block_gallery_id
 * @property int $number
 * @property string $url
 *
 * @property BlockGallery $blockGallery
 */
class BlockGalleryHasImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'block_gallery_has_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['block_gallery_id'], 'required'],
            [['block_gallery_id', 'number'], 'integer'],

            ['url', 'image', 'extensions'=>['png', 'jpg', 'jpeg', 'gif', 'JPG', 'JPEG'], 'maxSize'=>10485760],
            [['block_gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockGallery::class, 'targetAttribute' => ['block_gallery_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_gallery_id' => 'Block Gallery ID',
            'url' => 'Url',
            'number'=>'Номер',
        ];
    }

    /**
     * Gets query for [[BlockGallery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlockGallery()
    {
        return $this->hasOne(BlockGallery::class, ['id' => 'block_gallery_id']);
    }
}
