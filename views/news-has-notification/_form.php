<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NewsHasNotification $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-has-notification-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'notification_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Notification::find()->all(), 'id', 'title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
