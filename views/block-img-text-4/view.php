<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText4 $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Block Img Text4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="block-img-text4-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'img1',
            'img2',
            'title',
            'title2',
            'text',
            'text2',
            'button_text1',
            'button_text2',
            'button_link1',
            'button_link2',
            'button_text_color',
            'button_bg_color',
            'title_color',
            'text_color',
            'block_margin_top',
            'block_margin_bottom',
        ],
    ]) ?>

</div>
