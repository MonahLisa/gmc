<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lot".
 *
 * @property int $id
 * @property string $name
 * @property string $ACTEA2
 * @property string $ACPA2
 * @property int $unit_measurement_id
 * @property int $quantity
 * @property int $cost_per_unit
 * @property int $cost
 *
 * @property Notification[] $notifications
 * @property UnitMeasurement $unitMeasurement
 */
class Lot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ACTEA2', 'ACPA2', 'unit_measurement_id', 'quantity', 'cost_per_unit'], 'required'],
            [['unit_measurement_id', 'quantity', 'cost_per_unit', 'cost'], 'integer'],
            [['name', 'ACTEA2', 'ACPA2'], 'string', 'max' => 255],
            [['unit_measurement_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitMeasurement::class, 'targetAttribute' => ['unit_measurement_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование товара, работ, услуг',
            'ACTEA2' => 'Код по ОКВЭД2',
            'ACPA2' => 'Код по ОКПД2',
            'unit_measurement_id' => 'Единица измерения',
            'quantity' => 'Количество',
            'cost_per_unit' => 'Цена за ед.изм.',
            'cost' => 'Стоимость',
        ];
    }

    /**
     * Gets query for [[Notifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::class, ['lot_id' => 'id']);
    }

    /**
     * Gets query for [[UnitMeasurement]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitMeasurement()
    {
        return $this->hasOne(UnitMeasurement::class, ['id' => 'unit_measurement_id']);
    }
}
