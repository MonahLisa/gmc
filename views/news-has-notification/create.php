<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NewsHasNotification $model */

$this->title = 'Create News Has Notification';
$this->params['breadcrumbs'][] = ['label' => 'News Has Notifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-has-notification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
