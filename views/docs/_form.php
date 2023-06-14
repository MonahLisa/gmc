<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Docs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="docs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc')->fileInput() ?>
    <?= $form->field($model, 'category_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\DocumentCategory::find()->all(), 'id', 'title')))->label(''); ?>

<!--    --><?//= $form->field($model, 'category_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
