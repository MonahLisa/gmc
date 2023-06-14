<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit_measurement".
 *
 * @property int $id
 * @property string $title
 *
 * @property Lot[] $lots
 */
class UnitMeasurement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit_measurement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[Lots]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLots()
    {
        return $this->hasMany(Lot::class, ['unit_measurement_id' => 'id']);
    }
}
