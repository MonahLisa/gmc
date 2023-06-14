<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItem $model */

$this->title = 'Update Block Accordion Item: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Block Accordion Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="block-accordion-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
