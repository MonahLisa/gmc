<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationAdvantages $model */

$this->title = 'Update Notification Advantages: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notification Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notification-advantages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
