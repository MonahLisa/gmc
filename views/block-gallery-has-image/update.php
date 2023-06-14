<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockGalleryHasImage $model */

$this->title = 'Update Block Gallery Has Image: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Block Gallery Has Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="block-gallery-has-image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
