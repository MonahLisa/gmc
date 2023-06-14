<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notification;

/**
 * NotificationSearch represents the model behind the search form of `app\models\Notification`.
 */
class NotificationSearch extends Notification
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'status', 'method_of_determining_supplier_id', 'joint_procurement', 'placed_due_emergency', 'unscrupulous_supplier', 'advantages_id', 'involvement', 'limitation_id', 'initial_contract_price', 'source_funding_id', 'delivery_time', 'lot_id', 'requirement_secure_app', 'requirement_execution_contract'], 'integer'],
            [['title', 'date', 'electronic_platform_name', 'platform_link', 'carries_out_placement', 'customer_name', 'TIN', 'CRS', 'MSRN', 'location', 'postal_address', 'contact_info', 'requirements', 'conditions_for_admission_goods', 'requirements_for_content', 'date_notification_placement', 'start_date_application_deadline', 'datetime_deadline_applications', 'procedure_submitting', 'review_date', 'procedure_consideration', 'end_date_submitting_requests', 'subject_contract', 'expenses_info', 'payment_term', 'delivery_place', 'term_contract', 'cancellation_purchase', 'deadline_sub_doc_start', 'deadline_sub_doc_finish', 'provision_place', 'procedure_for_providing', 'doc_list'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Notification::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'status' => $this->status,
            'date' => $this->date,
            'method_of_determining_supplier_id' => $this->method_of_determining_supplier_id,
            'joint_procurement' => $this->joint_procurement,
            'placed_due_emergency' => $this->placed_due_emergency,
            'unscrupulous_supplier' => $this->unscrupulous_supplier,
            'advantages_id' => $this->advantages_id,
            'involvement' => $this->involvement,
            'limitation_id' => $this->limitation_id,
            'date_notification_placement' => $this->date_notification_placement,
            'start_date_application_deadline' => $this->start_date_application_deadline,
            'datetime_deadline_applications' => $this->datetime_deadline_applications,
            'review_date' => $this->review_date,
            'end_date_submitting_requests' => $this->end_date_submitting_requests,
            'initial_contract_price' => $this->initial_contract_price,
            'source_funding_id' => $this->source_funding_id,
            'delivery_time' => $this->delivery_time,
            'term_contract' => $this->term_contract,
            'lot_id' => $this->lot_id,
            'requirement_secure_app' => $this->requirement_secure_app,
            'requirement_execution_contract' => $this->requirement_execution_contract,
            'deadline_sub_doc_start' => $this->deadline_sub_doc_start,
            'deadline_sub_doc_finish' => $this->deadline_sub_doc_finish,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'electronic_platform_name', $this->electronic_platform_name])
            ->andFilterWhere(['like', 'platform_link', $this->platform_link])
            ->andFilterWhere(['like', 'carries_out_placement', $this->carries_out_placement])
            ->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'TIN', $this->TIN])
            ->andFilterWhere(['like', 'CRS', $this->CRS])
            ->andFilterWhere(['like', 'MSRN', $this->MSRN])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'postal_address', $this->postal_address])
            ->andFilterWhere(['like', 'contact_info', $this->contact_info])
            ->andFilterWhere(['like', 'requirements', $this->requirements])
            ->andFilterWhere(['like', 'conditions_for_admission_goods', $this->conditions_for_admission_goods])
            ->andFilterWhere(['like', 'requirements_for_content', $this->requirements_for_content])
            ->andFilterWhere(['like', 'procedure_submitting', $this->procedure_submitting])
            ->andFilterWhere(['like', 'procedure_consideration', $this->procedure_consideration])
            ->andFilterWhere(['like', 'subject_contract', $this->subject_contract])
            ->andFilterWhere(['like', 'expenses_info', $this->expenses_info])
            ->andFilterWhere(['like', 'payment_term', $this->payment_term])
            ->andFilterWhere(['like', 'delivery_place', $this->delivery_place])
            ->andFilterWhere(['like', 'cancellation_purchase', $this->cancellation_purchase])
            ->andFilterWhere(['like', 'provision_place', $this->provision_place])
            ->andFilterWhere(['like', 'procedure_for_providing', $this->procedure_for_providing])
            ->andFilterWhere(['like', 'doc_list', $this->doc_list]);

        return $dataProvider;
    }
}
