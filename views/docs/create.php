<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Docs $model */

$this->title = 'Добавить документ';
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
