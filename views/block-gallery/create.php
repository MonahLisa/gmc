<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockGallery $model */

$this->title = 'Create Block Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Block Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
