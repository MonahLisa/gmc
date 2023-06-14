<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockImg $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-img-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'block_margin_top')->textInput(['type' => 'number', 'min' => '0', 'max' => '50']) ?>

    <?= $form->field($model, 'block_margin_bottom')->textInput(['type' => 'number', 'min' => '0', 'max' => '50']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
