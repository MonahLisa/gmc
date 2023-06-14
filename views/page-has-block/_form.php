<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PageHasBlock $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="page-has-block-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->textInput() ?>

    <?= $form->field($model, 'cover_block_id')->textInput() ?>

    <?= $form->field($model, 'title_block_id')->textInput() ?>

    <?= $form->field($model, 'text_block_id')->textInput() ?>

    <?= $form->field($model, 'text_3_1_block_id')->textInput() ?>

    <?= $form->field($model, 'text_3_2_block_id')->textInput() ?>

    <?= $form->field($model, 'text_2_1_block_id')->textInput() ?>

    <?= $form->field($model, 'text_2_2_block_id')->textInput() ?>

    <?= $form->field($model, 'img_block_id')->textInput() ?>

    <?= $form->field($model, 'img_text_1_block')->textInput() ?>

    <?= $form->field($model, 'img_text_2_block')->textInput() ?>

    <?= $form->field($model, 'img_text_3_block')->textInput() ?>

    <?= $form->field($model, 'img_text_4_block')->textInput() ?>

    <?= $form->field($model, 'gallery_block_id')->textInput() ?>

    <?= $form->field($model, 'video_block')->textInput() ?>

    <?= $form->field($model, 'slider_block')->textInput() ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
