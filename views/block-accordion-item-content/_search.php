<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItemContentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-accordion-item-content-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'doc_text') ?>

    <?= $form->field($model, 'doc_id') ?>

    <?= $form->field($model, 'item_text') ?>

    <?= $form->field($model, 'block_accordion_item_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
