<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItemContent $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-accordion-item-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'doc_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Docs::find()->all(), 'id', 'title')) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
