<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockText32Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-text32-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'main_title') ?>

    <?= $form->field($model, 'second_title_1') ?>

    <?= $form->field($model, 'second_title_2') ?>

    <?= $form->field($model, 'second_title_3') ?>

    <?php // echo $form->field($model, 'second_title_4') ?>

    <?php // echo $form->field($model, 'second_title_5') ?>

    <?php // echo $form->field($model, 'second_title_6') ?>

    <?php // echo $form->field($model, 'text1') ?>

    <?php // echo $form->field($model, 'text2') ?>

    <?php // echo $form->field($model, 'text3') ?>

    <?php // echo $form->field($model, 'text4') ?>

    <?php // echo $form->field($model, 'text5') ?>

    <?php // echo $form->field($model, 'text6') ?>

    <?php // echo $form->field($model, 'main_title_color') ?>

    <?php // echo $form->field($model, 'second_title_color') ?>

    <?php // echo $form->field($model, 'text_color') ?>

    <?php // echo $form->field($model, 'block_margin_top') ?>

    <?php // echo $form->field($model, 'block_margin_bottom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
