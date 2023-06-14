<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockText22Search $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-text22-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'main_title') ?>

    <?= $form->field($model, 'text1') ?>

    <?= $form->field($model, 'main_title_color') ?>

    <?= $form->field($model, 'text_color') ?>

    <?php // echo $form->field($model, 'block_margin_top') ?>

    <?php // echo $form->field($model, 'block_margin_bottom') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
