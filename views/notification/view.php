<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Notification $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Извещение', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="notification-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить извещение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'type_id',
            'status',
            'date',
            'electronic_platform_name',
            'method_of_determining_supplier_id',
            'platform_link',
            'joint_procurement',
            'placed_due_emergency',
            'carries_out_placement',
            'customer_name',
            'TIN',
            'CRS',
            'MSRN',
            'location',
            'postal_address',
            'contact_info:ntext',
            'requirements',
            'unscrupulous_supplier',
            'advantages_id',
            'involvement',
            'limitation_id',
            'conditions_for_admission_goods:ntext',
            'requirements_for_content:ntext',
            'date_notification_placement',
            'start_date_application_deadline',
            'datetime_deadline_applications',
            'procedure_submitting:ntext',
            'review_date',
            'procedure_consideration:ntext',
            'end_date_submitting_requests',
            'subject_contract',
            'initial_contract_price',
            'source_funding_id',
            'expenses_info:ntext',
            'payment_term:ntext',
            'delivery_place',
            'delivery_time:datetime',
            'term_contract',
            'lot_id',
            'cancellation_purchase',
            'requirement_secure_app',
            'requirement_execution_contract',
            'deadline_sub_doc_start',
            'deadline_sub_doc_finish',
            'provision_place:ntext',
            'procedure_for_providing',
            'doc_list:ntext',
        ],
    ]) ?>

</div>
