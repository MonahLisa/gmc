<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Notification $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\NotificationType::find()->all(), 'id', 'title'))); ?>

    <?= $form->field($model, 'status')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\NotificationStatus::find()->all(), 'id', 'title'))); ?>

    <?= $form->field($model, 'date')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'electronic_platform_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'method_of_determining_supplier_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\NotificationMethod::find()->all(), 'id', 'title'))); ?>

    <?= $form->field($model, 'platform_link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'joint_procurement')->dropDownList([
        0 => 'Да',
        1 => 'Нет',

    ]);?>


    <?= $form->field($model, 'placed_due_emergency')->dropDownList([
        0 => 'Да',
        1 => 'Нет',

    ]);?>




    <?= $form->field($model, 'carries_out_placement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CRS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MSRN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postal_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requirements')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'unscrupulous_supplier')->dropDownList([
        0 => 'Да',
        1 => 'Нет',

    ]);?>




    <?= $form->field($model, 'advantages_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\NotificationAdvantages::find()->all(), 'id', 'title'))); ?>




    <?= $form->field($model, 'involvement')->dropDownList([
        0 => 'Да',
        1 => 'Нет',

    ]);?>



    <?= $form->field($model, 'limitation_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\NotificationLimitation::find()->all(), 'id', 'title'))); ?>

    <?= $form->field($model, 'conditions_for_admission_goods')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'requirements_for_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_notification_placement')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'start_date_application_deadline')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'datetime_deadline_applications')->textInput(["type"=>"datetime-local"]) ?>

    <?= $form->field($model, 'procedure_submitting')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'review_date')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'procedure_consideration')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'end_date_submitting_requests')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'subject_contract')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'initial_contract_price')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'source_funding_id')->dropDownList((\yii\helpers\ArrayHelper::map(\app\models\NotificationSourceFunding::find()->all(), 'id', 'title'))); ?>

    <?= $form->field($model, 'expenses_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'payment_term')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'delivery_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_time')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'term_contract')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'lot_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Lot::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'cancellation_purchase')->textInput(['maxlength' => true]) ?>





    <?= $form->field($model, 'requirement_secure_app')->dropDownList([
        0 => 'Да',
        1 => 'Нет',

    ]);?>

    <?= $form->field($model, 'requirement_execution_contract')->dropDownList([
        0 => 'Да',
        1 => 'Нет',

    ]);?>



    <?= $form->field($model, 'deadline_sub_doc_start')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'deadline_sub_doc_finish')->textInput(['type'=>'date']) ?>

    <?= $form->field($model, 'provision_place')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'procedure_for_providing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doc_list')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
