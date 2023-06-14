<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationAdvantages $model */

$this->title = 'Create Notification Advantages';
$this->params['breadcrumbs'][] = ['label' => 'Notification Advantages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-advantages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
