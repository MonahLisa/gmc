<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NavDropdown $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="nav-dropdown-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_text')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
