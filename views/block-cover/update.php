<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockCover $model */

$this->title = 'Update Block Cover: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Block Covers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="block-cover-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
