<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Page $model */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>





</div>