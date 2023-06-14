<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockAccordion $model */

$this->title = 'Create Block Accordion';
$this->params['breadcrumbs'][] = ['label' => 'Block Accordions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-accordion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
