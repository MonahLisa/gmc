<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockGalleryHasImage $model */

$this->title = 'Create Block Gallery Has Image';
$this->params['breadcrumbs'][] = ['label' => 'Block Gallery Has Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-gallery-has-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
