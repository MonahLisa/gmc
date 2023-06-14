<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Document $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->fileInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\DocumentCategory::find()->all(), 'id', 'title')))->label(''); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
