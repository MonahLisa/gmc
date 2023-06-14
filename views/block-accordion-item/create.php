<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItem $model */

$this->title = 'Create Block Accordion Item';
$this->params['breadcrumbs'][] = ['label' => 'Block Accordion Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-accordion-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
