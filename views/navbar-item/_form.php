<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NavbarItem $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="navbar-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nav_item_text')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
