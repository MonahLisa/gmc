<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NewsHasNotification $model */

$this->title = 'Update News Has Notification: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News Has Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-has-notification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
