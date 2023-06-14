<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\BlockText31 $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Block Text31s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="block-text31-view">

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
            'second_title_3',
            'text1',
            'text2',
            'text3',
            'main_title_color',
            'second_title_color',
            'text_color',
            'block_margin_top',
            'block_margin_bottom',
        ],
    ]) ?>

</div>
