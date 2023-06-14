<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText1Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-img-text1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'text') ?>

    <?= $form->field($model, 'img_orientation') ?>

    <?php // echo $form->field($model, 'block_margin_top') ?>

    <?php // echo $form->field($model, 'block_margin_bottom') ?>

    <?php // echo $form->field($model, 'title_color') ?>

    <?php // echo $form->field($model, 'text_color') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
