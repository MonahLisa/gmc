<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\NotificationSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'electronic_platform_name') ?>

    <?php // echo $form->field($model, 'method_of_determining_supplier_id') ?>

    <?php // echo $form->field($model, 'platform_link') ?>

    <?php // echo $form->field($model, 'joint_procurement') ?>

    <?php // echo $form->field($model, 'placed_due_emergency') ?>

    <?php // echo $form->field($model, 'carries_out_placement') ?>

    <?php // echo $form->field($model, 'customer_name') ?>

    <?php // echo $form->field($model, 'TIN') ?>

    <?php // echo $form->field($model, 'CRS') ?>

    <?php // echo $form->field($model, 'MSRN') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'postal_address') ?>

    <?php // echo $form->field($model, 'contact_info') ?>

    <?php // echo $form->field($model, 'requirements') ?>

    <?php // echo $form->field($model, 'unscrupulous_supplier') ?>

    <?php // echo $form->field($model, 'advantages_id') ?>

    <?php // echo $form->field($model, 'involvement') ?>

    <?php // echo $form->field($model, 'limitation_id') ?>

    <?php // echo $form->field($model, 'conditions_for_admission_goods') ?>

    <?php // echo $form->field($model, 'requirements_for_content') ?>

    <?php // echo $form->field($model, 'date_notification_placement') ?>

    <?php // echo $form->field($model, 'start_date_application_deadline') ?>

    <?php // echo $form->field($model, 'datetime_deadline_applications') ?>

    <?php // echo $form->field($model, 'procedure_submitting') ?>

    <?php // echo $form->field($model, 'review_date') ?>

    <?php // echo $form->field($model, 'procedure_consideration') ?>

    <?php // echo $form->field($model, 'end_date_submitting_requests') ?>

    <?php // echo $form->field($model, 'subject_contract') ?>

    <?php // echo $form->field($model, 'initial_contract_price') ?>

    <?php // echo $form->field($model, 'source_funding_id') ?>

    <?php // echo $form->field($model, 'expenses_info') ?>

    <?php // echo $form->field($model, 'payment_term') ?>

    <?php // echo $form->field($model, 'delivery_place') ?>

    <?php // echo $form->field($model, 'delivery_time') ?>

    <?php // echo $form->field($model, 'term_contract') ?>

    <?php // echo $form->field($model, 'lot_id') ?>

    <?php // echo $form->field($model, 'cancellation_purchase') ?>

    <?php // echo $form->field($model, 'requirement_secure_app') ?>

    <?php // echo $form->field($model, 'requirement_execution_contract') ?>

    <?php // echo $form->field($model, 'deadline_sub_doc_start') ?>

    <?php // echo $form->field($model, 'deadline_sub_doc_finish') ?>

    <?php // echo $form->field($model, 'provision_place') ?>

    <?php // echo $form->field($model, 'procedure_for_providing') ?>

    <?php // echo $form->field($model, 'doc_list') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
