<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationSourceFunding $model */

$this->title = 'Update Notification Source Funding: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notification Source Fundings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-source-funding-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
