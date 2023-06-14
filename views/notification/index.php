<?php

use app\models\Notification;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NotificationSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Извещения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать извещение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>
        <?= Html::a('Документы извещения', ['/notification-document'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>
        <?= Html::a('Тип извещения', ['/notification-type'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>
        <?= Html::a('Способ проведения закупки/определения поставщика', ['/notification-method'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Преимущества', ['/notification-advantages'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Ограничения', ['/notification-limitation'], ['class' => 'btn btn-success']) ?>
    </p>


    <p>
        <?= Html::a('Источник финансирования', ['/notification-source-funding'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Создать лот', ['/lot/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'type_id',
            'status',
            'date',
            //'electronic_platform_name',
            //'method_of_determining_supplier_id',
            //'platform_link',
            //'joint_procurement',
            //'placed_due_emergency',
            //'carries_out_placement',
            //'customer_name',
            //'TIN',
            //'CRS',
            //'MSRN',
            //'location',
            //'postal_address',
            //'contact_info:ntext',
            //'requirements',
            //'unscrupulous_supplier',
            //'advantages_id',
            //'involvement',
            //'limitation_id',
            //'conditions_for_admission_goods:ntext',
            //'requirements_for_content:ntext',
            //'date_notification_placement',
            //'start_date_application_deadline',
            //'datetime_deadline_applications',
            //'procedure_submitting:ntext',
            //'review_date',
            //'procedure_consideration:ntext',
            //'end_date_submitting_requests',
            //'subject_contract',
            //'initial_contract_price',
            //'source_funding_id',
            //'expenses_info:ntext',
            //'payment_term:ntext',
            //'delivery_place',
            //'delivery_time:datetime',
            //'term_contract',
            //'lot_id',
            //'cancellation_purchase',
            //'requirement_secure_app',
            //'requirement_execution_contract',
            //'deadline_sub_doc_start',
            //'deadline_sub_doc_finish',
            //'provision_place:ntext',
            //'procedure_for_providing',
            //'doc_list:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Notification $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
