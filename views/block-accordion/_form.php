<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-accordion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'block_margin_top')->textInput() ?>

    <?= $form->field($model, 'block_margin_bottom')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
