<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NavbarItem $model */

$this->title = 'Update Navbar Item: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Navbar Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="navbar-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
