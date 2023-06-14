<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BlockText21 $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Block Text21s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="block-text21-view">

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
            'main_title',
            'second_title_1',
            'second_title_2',
            'text1',
            'text2',
            'main_title_color',
            'second_title_color',
            'text_color',
            'block_margin_top',
            'block_margin_bottom',
        ],
    ]) ?>

</div>
