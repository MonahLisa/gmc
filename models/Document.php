<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property int $category_id
 *
 * @property DocumentCategory $category
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @var UploadedFile
     */
    public $docFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['url'], 'file', 'skipOnEmpty' => false, 'extensions'=>['pdf', 'docx', 'doc'], 'maxSize'=>10485760],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

//    public function upload()
//    {
//        if ($this->validate()) {
//            $this->docFile->saveAs('web/uploads/' . $this->docFile->baseName . '.' . $this->docFile->extension);
//            return true;
//        } else {
//            return false;
//        }
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'category_id' => 'Category ID',
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
