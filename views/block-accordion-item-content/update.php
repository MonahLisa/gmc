<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItemContent $model */

$this->title = 'Update Block Accordion Item Content: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Block Accordion Item Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="block-accordion-item-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
