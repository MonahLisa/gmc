<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lot $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACTEA2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACPA2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_measurement_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\UnitMeasurement::find()->all(), 'id', 'title')) ?>

    <?= $form->field($model, 'quantity')->textInput(['type' => 'number', 'min' => 1]) ?>

    <?= $form->field($model, 'cost_per_unit')->textInput(['type' => 'number', 'min' => 1]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
