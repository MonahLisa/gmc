<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PageHasBlockSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="page-has-block-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'page_id') ?>

    <?= $form->field($model, 'cover_block_id') ?>

    <?= $form->field($model, 'title_block_id') ?>

    <?= $form->field($model, 'text_block_id') ?>

    <?php // echo $form->field($model, 'text_3_1_block_id') ?>

    <?php // echo $form->field($model, 'text_3_2_block_id') ?>

    <?php // echo $form->field($model, 'text_2_1_block_id') ?>

    <?php // echo $form->field($model, 'text_2_2_block_id') ?>

    <?php // echo $form->field($model, 'img_block_id') ?>

    <?php // echo $form->field($model, 'img_text_1_block') ?>

    <?php // echo $form->field($model, 'img_text_2_block') ?>

    <?php // echo $form->field($model, 'img_text_3_block') ?>

    <?php // echo $form->field($model, 'img_text_4_block') ?>

    <?php // echo $form->field($model, 'gallery_block_id') ?>

    <?php // echo $form->field($model, 'video_block') ?>

    <?php // echo $form->field($model, 'slider_block') ?>

    <?php // echo $form->field($model, 'number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
