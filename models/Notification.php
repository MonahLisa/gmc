<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property string $title
 * @property int $type_id
 * @property int $status
 * @property string $date
 * @property string|null $electronic_platform_name
 * @property int $method_of_determining_supplier_id
 * @property string|null $platform_link
 * @property int|null $joint_procurement
 * @property int|null $placed_due_emergency
 * @property string $carries_out_placement
 * @property string $customer_name
 * @property string $TIN
 * @property string $CRS
 * @property string $MSRN
 * @property string $location
 * @property string $postal_address
 * @property string $contact_info
 * @property string|null $requirements
 * @property int|null $unscrupulous_supplier
 * @property int $advantages_id
 * @property int|null $involvement
 * @property int|null $limitation_id
 * @property string|null $conditions_for_admission_goods
 * @property string|null $requirements_for_content
 * @property string|null $date_notification_placement
 * @property string|null $start_date_application_deadline
 * @property string|null $datetime_deadline_applications
 * @property string|null $procedure_submitting
 * @property string|null $review_date
 * @property string|null $procedure_consideration
 * @property string|null $end_date_submitting_requests
 * @property string|null $subject_contract
 * @property int $initial_contract_price
 * @property int $source_funding_id
 * @property string $expenses_info
 * @property string $payment_term
 * @property string $delivery_place
 * @property int $delivery_time
 * @property string $term_contract
 * @property int $lot_id
 * @property string|null $cancellation_purchase
 * @property int|null $requirement_secure_app
 * @property int|null $requirement_execution_contract
 * @property string|null $deadline_sub_doc_start
 * @property string|null $deadline_sub_doc_finish
 * @property string|null $provision_place
 * @property string|null $procedure_for_providing
 * @property string $doc_list
 *
 * @property NotificationAdvantages $advantages
 * @property NotificationLimitation $limitation
 * @property Lot $lot
 * @property NotificationMethod $methodOfDeterminingSupplier
 * @property NewsHasNotification[] $newsHasNotifications
 * @property NotificationDocument[] $notificationDocuments
 * @property NotificationSourceFunding $sourceFunding
 * @property NotificationStatus $status0
 * @property NotificationType $type
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'type_id', 'status', 'date', 'method_of_determining_supplier_id', 'carries_out_placement', 'customer_name', 'TIN', 'CRS', 'MSRN', 'location', 'postal_address', 'contact_info', 'advantages_id', 'initial_contract_price', 'source_funding_id', 'expenses_info', 'payment_term', 'delivery_place', 'delivery_time', 'term_contract', 'lot_id', 'doc_list'], 'required'],
            [['type_id', 'status', 'method_of_determining_supplier_id', 'joint_procurement', 'placed_due_emergency', 'unscrupulous_supplier', 'advantages_id', 'involvement', 'limitation_id', 'initial_contract_price', 'source_funding_id', 'delivery_time', 'lot_id', 'requirement_secure_app', 'requirement_execution_contract'], 'integer'],
            [['date', 'date_notification_placement', 'start_date_application_deadline', 'datetime_deadline_applications', 'review_date', 'end_date_submitting_requests', 'term_contract', 'deadline_sub_doc_start', 'deadline_sub_doc_finish'], 'safe'],
            [['contact_info', 'conditions_for_admission_goods', 'requirements_for_content', 'procedure_submitting', 'procedure_consideration', 'expenses_info', 'payment_term', 'provision_place', 'doc_list'], 'string'],
            [['title', 'electronic_platform_name', 'platform_link', 'carries_out_placement', 'customer_name', 'TIN', 'CRS', 'MSRN', 'location', 'postal_address', 'requirements', 'subject_contract', 'delivery_place', 'cancellation_purchase', 'procedure_for_providing'], 'string', 'max' => 255],
            [['advantages_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationAdvantages::class, 'targetAttribute' => ['advantages_id' => 'id']],
            [['limitation_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationLimitation::class, 'targetAttribute' => ['limitation_id' => 'id']],
            [['source_funding_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationSourceFunding::class, 'targetAttribute' => ['source_funding_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationStatus::class, 'targetAttribute' => ['status' => 'id']],
            [['method_of_determining_supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => NotificationMethod::class, 'targetAttribute' => ['method_of_determining_supplier_id' => 'id']],
            [['lot_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lot::class, 'targetAttribute' => ['lot_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название извещения',
            'type_id' => 'Тип извещения',
            'status' => 'Статус извещения',
            'date' => 'Дата добавления извещения',
            'electronic_platform_name' => 'Наименование электронной площадки в информационно-телекоммуникационной сети «Интернет»',
            'method_of_determining_supplier_id' => 'Способ проведения закупки/определения поставщика',
            'platform_link' => 'Адрес электронной площадки в информационно-телекоммуникационной сети «Интернет»',
            'joint_procurement' => 'Совместная закупка',
            'placed_due_emergency' => 'Размещается вследствие ЧС',
            'carries_out_placement' => 'Размещение осуществляет',
            'customer_name' => 'Наименование Заказчика',
            'TIN' => 'ИНН',
            'CRS' => 'КПП',
            'MSRN' => 'ОГРН',
            'location' => 'Место нахождения (юридический адрес)',
            'postal_address' => 'Почтовый адрес (фактический адрес)',
            'contact_info' => 'Контактная информация',
            'requirements' => 'Требования к участникам закупки',
            'unscrupulous_supplier' => 'Требование к отсутствию участников закупки в Реестре недобросовестных поставщиков',
            'advantages_id' => 'Преимущества',
            'involvement' => 'Привлечение к исполнению договора субподрядрядчиков (соисполнителей) из числа субъектов малого и среднего предпринимательства',
            'limitation_id' => 'Ограничение участия в определении поставщика (подрядчика, исполнителя)',
            'conditions_for_admission_goods' => 'Условия, приоритеты, запреты и ограничения допуска товаров, происходящих из иностранного государства или группы иностранных государств, работ, услуг, соответственно выполняемых, оказываемых иностранными лицами',
            'requirements_for_content' => 'Требования к содержанию, составу котировочной заявки и инструкция по ее заполнению. Условия подачи котировочных заявок',
            'date_notification_placement' => 'Дата размещения извещения на электронной площадке',
            'start_date_application_deadline' => 'Дата начала срока подачи заявок',
            'datetime_deadline_applications' => 'Дата и время окончания срока подачи заявок (по московскому времени)',
            'procedure_submitting' => 'Порядок подачи котировочных заявок',
            'review_date' => 'Дата рассмотрения и оценки (ранжирования) заявок',
            'procedure_consideration' => 'Порядок рассмотрения котировочных заявок и подведения итогов закупочной процедуры',
            'end_date_submitting_requests' => 'Дата окончания подачи запросов на разъяснение извещения по закупке',
            'subject_contract' => 'Предмет договора',
            'initial_contract_price' => 'Начальная (максимальная) цена договора',
            'source_funding_id' => 'Источник финансирования',
            'expenses_info' => 'Сведения о включенных (не включенных) в цену товара, выполнения работ, оказания услуг расходах',
            'payment_term' => 'Срок и условия оплаты за поставленный товар',
            'delivery_place' => 'Место поставки товара, выполнения работ, оказания услуг',
            'delivery_time' => 'Срок поставки товара, выполнения работ, оказания услуг',
            'term_contract' => 'Срок действия договора',
            'lot_id' => 'Объект закупки (лот)',
            'cancellation_purchase' => 'Возможность отмены закупки Заказчиком',
            'requirement_secure_app' => 'Требование к обеспечению заявки',
            'requirement_execution_contract' => 'Требование к обеспечению исполнения договора',
            'deadline_sub_doc_start' => 'Срок предоставления (с какой даты начинается)',
            'deadline_sub_doc_finish' => 'Срок предоставления (какой датой заканчивается)',
            'provision_place' => 'Место предоставления',
            'procedure_for_providing' => 'Порядок предоставления',
            'doc_list' => 'Перечень прикрепленных документов',
        ];
    }

    /**
     * Gets query for [[Advantages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdvantages()
    {
        return $this->hasOne(NotificationAdvantages::class, ['id' => 'advantages_id']);
    }

    /**
     * Gets query for [[Limitation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLimitation()
    {
        return $this->hasOne(NotificationLimitation::class, ['id' => 'limitation_id']);
    }

    /**
     * Gets query for [[Lot]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLot()
    {
        return $this->hasOne(Lot::class, ['id' => 'lot_id']);
    }

    /**
     * Gets query for [[MethodOfDeterminingSupplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethodOfDeterminingSupplier()
    {
        return $this->hasOne(NotificationMethod::class, ['id' => 'method_of_determining_supplier_id']);
    }

    /**
     * Gets query for [[NewsHasNotifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsHasNotifications()
    {
        return $this->hasMany(NewsHasNotification::class, ['notification_id' => 'id']);
    }

    /**
     * Gets query for [[NotificationDocuments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotificationDocuments()
    {
        return $this->hasMany(NotificationDocument::class, ['notification_id' => 'id']);
    }

    /**
     * Gets query for [[SourceFunding]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSourceFunding()
    {
        return $this->hasOne(NotificationSourceFunding::class, ['id' => 'source_funding_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(NotificationStatus::class, ['id' => 'status']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(NotificationType::class, ['id' => 'type_id']);
    }
}
