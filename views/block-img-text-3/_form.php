<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText3 $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="block-img-text3-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen',
            ],
            'clips' => [
                ['Lorem ipsum...', 'Lorem...'],
                ['red', '<span class="label-red">red</span>'],
                ['green', '<span class="label-green">green</span>'],
                ['blue', '<span class="label-blue">blue</span>'],
            ],
        ],
    ]);?>

    <?= $form->field($model, 'block_margin_top')->textInput(['type' => 'number', 'min' => '0', 'max' => '50']) ?>

    <?= $form->field($model, 'block_margin_bottom')->textInput(['type' => 'number', 'min' => '0', 'max' => '50']) ?>

    <?= $form->field($model, 'title_color')->textInput(['type' => 'color', 'style' => 'width: 15%;']) ?>

    <?= $form->field($model, 'text_color')->textInput(['type' => 'color', 'style' => 'width: 15%;']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
