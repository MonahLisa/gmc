<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationDocument $model */

$this->title = 'Create Notification Document';
$this->params['breadcrumbs'][] = ['label' => 'Notification Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
