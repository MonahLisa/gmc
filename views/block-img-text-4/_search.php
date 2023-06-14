<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText4Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-img-text4-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'img1') ?>

    <?= $form->field($model, 'img2') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'title2') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'text2') ?>

    <?php // echo $form->field($model, 'button_text1') ?>

    <?php // echo $form->field($model, 'button_text2') ?>

    <?php // echo $form->field($model, 'button_link1') ?>

    <?php // echo $form->field($model, 'button_link2') ?>

    <?php // echo $form->field($model, 'button_text_color') ?>

    <?php // echo $form->field($model, 'button_bg_color') ?>

    <?php // echo $form->field($model, 'title_color') ?>

    <?php // echo $form->field($model, 'text_color') ?>

    <?php // echo $form->field($model, 'block_margin_top') ?>

    <?php // echo $form->field($model, 'block_margin_bottom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
