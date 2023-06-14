<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationMethod $model */

$this->title = 'Create Notification Method';
$this->params['breadcrumbs'][] = ['label' => 'Notification Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-method-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
