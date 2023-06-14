<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NavbarItem $model */
?>

<div class="navbar-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nav_item_page_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Page::find()->all(), 'id', 'title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>