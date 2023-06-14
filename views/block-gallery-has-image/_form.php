<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockGalleryHasImage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-gallery-has-image-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'url')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
