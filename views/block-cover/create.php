<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockCover $model */

$this->title = 'Create Block Cover';
$this->params['breadcrumbs'][] = ['label' => 'Block Covers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-cover-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
