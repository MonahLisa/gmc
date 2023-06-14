<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NewsHasDoc $model */

$this->title = 'Create News Has Doc';
$this->params['breadcrumbs'][] = ['label' => 'News Has Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-has-doc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
