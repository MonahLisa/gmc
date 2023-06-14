<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NewsHasDoc $model */

$this->title = 'Update News Has Doc: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News Has Docs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-has-doc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
