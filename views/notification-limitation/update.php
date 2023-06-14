<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationLimitation $model */

$this->title = 'Update Notification Limitation: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notification Limitations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-limitation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
