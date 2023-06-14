<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NotificationSourceFunding $model */

$this->title = 'Create Notification Source Funding';
$this->params['breadcrumbs'][] = ['label' => 'Notification Source Fundings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notification-source-funding-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
