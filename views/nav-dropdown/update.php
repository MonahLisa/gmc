<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NavDropdown $model */

$this->title = 'Update Nav Dropdown: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nav Dropdowns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nav-dropdown-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
