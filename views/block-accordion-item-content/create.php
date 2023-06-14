<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItemContent $model */

$this->title = 'Create Block Accordion Item Content';
$this->params['breadcrumbs'][] = ['label' => 'Block Accordion Item Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-accordion-item-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
