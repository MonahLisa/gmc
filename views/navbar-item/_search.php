<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NavbarItemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="navbar-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nav_item_text') ?>

    <?= $form->field($model, 'nav_item_link') ?>

    <?= $form->field($model, 'nav_item_page_id') ?>

    <?= $form->field($model, 'dropdown_text') ?>

    <?php // echo $form->field($model, 'number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
