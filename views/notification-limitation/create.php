<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationLimitation $model */

$this->title = 'Create Notification Limitation';
$this->params['breadcrumbs'][] = ['label' => 'Notification Limitations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-limitation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
