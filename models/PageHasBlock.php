<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page_has_block".
 *
 * @property int $id
 * @property int $page_id
 * @property int|null $cover_block_id
 * @property int|null $title_block_id
 * @property int|null $text_block_id
 * @property int|null $text_3_1_block_id
 * @property int|null $text_3_2_block_id
 * @property int|null $text_2_1_block_id
 * @property int|null $text_2_2_block_id
 * @property int|null $img_block_id
 * @property int|null $img_text_1_block
 * @property int|null $img_text_2_block
 * @property int|null $img_text_3_block
 * @property int|null $img_text_4_block
 * @property int|null $gallery_block_id
 * @property int|null $video_block
 * @property int|null $slider_block
 * @property int|null $accordion_id
 * @property int $number
 *
 * @property BlockCover $coverBlock
 * @property BlockGallery $galleryBlock
 * @property BlockImg $imgBlock
 * @property BlockImgText1 $imgText1Block
 * @property BlockImgText2 $imgText2Block
 * @property BlockImgText3 $imgText3Block
 * @property BlockImgText4 $imgText4Block
 * @property Page $page
 * @property BlockSlider $sliderBlock
 * @property BlockText21 $text21Block
 * @property BlockText22 $text22Block
 * @property BlockText31 $text31Block
 * @property BlockText32 $text32Block
 * @property BlockText $textBlock
 * @property BlockAccordion $accordionBlock
 * @property BlockTitle $titleBlock
 * @property BlockVideo $videoBlock
 */
class PageHasBlock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_has_block';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'number'], 'required'],
            [['page_id', 'cover_block_id', 'title_block_id', 'text_block_id', 'text_3_1_block_id', 'text_3_2_block_id', 'text_2_1_block_id', 'text_2_2_block_id', 'img_block_id', 'img_text_1_block', 'img_text_2_block', 'img_text_3_block', 'img_text_4_block', 'gallery_block_id', 'video_block', 'slider_block', 'accordion_id', 'number'], 'integer'],
            [['accordion_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockAccordion::class, 'targetAttribute' => ['accordion_id' => 'id']],
            [['text_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockText::class, 'targetAttribute' => ['text_block_id' => 'id']],
            [['img_text_2_block'], 'exist', 'skipOnError' => true, 'targetClass' => BlockImgText2::class, 'targetAttribute' => ['img_text_2_block' => 'id']],
            [['img_text_3_block'], 'exist', 'skipOnError' => true, 'targetClass' => BlockImgText3::class, 'targetAttribute' => ['img_text_3_block' => 'id']],
            [['img_text_4_block'], 'exist', 'skipOnError' => true, 'targetClass' => BlockImgText4::class, 'targetAttribute' => ['img_text_4_block' => 'id']],
            [['slider_block'], 'exist', 'skipOnError' => true, 'targetClass' => BlockSlider::class, 'targetAttribute' => ['slider_block' => 'id']],
            [['gallery_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockGallery::class, 'targetAttribute' => ['gallery_block_id' => 'id']],
            [['cover_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockCover::class, 'targetAttribute' => ['cover_block_id' => 'id']],
            [['text_2_1_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockText21::class, 'targetAttribute' => ['text_2_1_block_id' => 'id']],
            [['video_block'], 'exist', 'skipOnError' => true, 'targetClass' => BlockVideo::class, 'targetAttribute' => ['video_block' => 'id']],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::class, 'targetAttribute' => ['page_id' => 'id']],
            [['title_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockTitle::class, 'targetAttribute' => ['title_block_id' => 'id']],
            [['text_2_2_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockText22::class, 'targetAttribute' => ['text_2_2_block_id' => 'id']],
            [['text_3_1_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockText31::class, 'targetAttribute' => ['text_3_1_block_id' => 'id']],
            [['text_3_2_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockText32::class, 'targetAttribute' => ['text_3_2_block_id' => 'id']],
            [['img_block_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlockImg::class, 'targetAttribute' => ['img_block_id' => 'id']],
            [['img_text_1_block'], 'exist', 'skipOnError' => true, 'targetClass' => BlockImgText1::class, 'targetAttribute' => ['img_text_1_block' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Page ID',
            'cover_block_id' => 'Cover Block ID',
            'title_block_id' => 'Title Block ID',
            'text_block_id' => 'Text Block ID',
            'accordion_id' => 'Accordion ID',
            'text_3_1_block_id' => 'Text 3 1 Block ID',
            'text_3_2_block_id' => 'Text 3 2 Block ID',
            'text_2_1_block_id' => 'Text 2 1 Block ID',
            'text_2_2_block_id' => 'Text 2 2 Block ID',
            'img_block_id' => 'Img Block ID',
            'img_text_1_block' => 'Img Text 1 Block',
            'img_text_2_block' => 'Img Text 2 Block',
            'img_text_3_block' => 'Img Text 3 Block',
            'img_text_4_block' => 'Img Text 4 Block',
            'gallery_block_id' => 'Gallery Block ID',
            'video_block' => 'Video Block',
            'slider_block' => 'Slider Block',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[CoverBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoverBlock()
    {
        return $this->hasOne(BlockCover::class, ['id' => 'cover_block_id']);
    }

    /**
     * Gets query for [[GalleryBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalleryBlock()
    {
        return $this->hasOne(BlockGallery::class, ['id' => 'gallery_block_id']);
    }

    /**
     * Gets query for [[ImgBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgBlock()
    {
        return $this->hasOne(BlockImg::class, ['id' => 'img_block_id']);
    }

    /**
     * Gets query for [[ImgText1Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgText1Block()
    {
        return $this->hasOne(BlockImgText1::class, ['id' => 'img_text_1_block']);
    }

    /**
     * Gets query for [[ImgText1Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccordionBlock()
    {
        return $this->hasOne(BlockAccordion::class, ['id' => 'accordion_id']);
    }

    /**
     * Gets query for [[ImgText2Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgText2Block()
    {
        return $this->hasOne(BlockImgText2::class, ['id' => 'img_text_2_block']);
    }

    /**
     * Gets query for [[ImgText3Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgText3Block()
    {
        return $this->hasOne(BlockImgText3::class, ['id' => 'img_text_3_block']);
    }

    /**
     * Gets query for [[ImgText4Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgText4Block()
    {
        return $this->hasOne(BlockImgText4::class, ['id' => 'img_text_4_block']);
    }

    /**
     * Gets query for [[Page]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::class, ['id' => 'page_id']);
    }

    /**
     * Gets query for [[SliderBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSliderBlock()
    {
        return $this->hasOne(BlockSlider::class, ['id' => 'slider_block']);
    }

    /**
     * Gets query for [[Text21Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getText21Block()
    {
        return $this->hasOne(BlockText21::class, ['id' => 'text_2_1_block_id']);
    }

    /**
     * Gets query for [[Text22Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getText22Block()
    {
        return $this->hasOne(BlockText22::class, ['id' => 'text_2_2_block_id']);
    }

    /**
     * Gets query for [[Text31Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getText31Block()
    {
        return $this->hasOne(BlockText31::class, ['id' => 'text_3_1_block_id']);
    }

    /**
     * Gets query for [[Text32Block]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getText32Block()
    {
        return $this->hasOne(BlockText32::class, ['id' => 'text_3_2_block_id']);
    }

    /**
     * Gets query for [[TextBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTextBlock()
    {
        return $this->hasOne(BlockText::class, ['id' => 'text_block_id']);
    }

    /**
     * Gets query for [[TitleBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitleBlock()
    {
        return $this->hasOne(BlockTitle::class, ['id' => 'title_block_id']);
    }

    /**
     * Gets query for [[VideoBlock]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoBlock()
    {
        return $this->hasOne(BlockVideo::class, ['id' => 'video_block']);
    }
}
