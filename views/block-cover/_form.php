<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockCover $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-cover-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'button_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'button_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'button_bg_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'button_text_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block_margin_top')->textInput() ?>

    <?= $form->field($model, 'block_margin_bottom')->textInput() ?>

    <?= $form->field($model, 'title_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_color')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
