<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NavbarItem $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'Создать список';
$this->params['breadcrumbs'][] = ['label' => 'Меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navbar-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="navbar-item-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dropdown_text')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>