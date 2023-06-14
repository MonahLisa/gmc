<?php

use app\models\BlockCover;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockCoverSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Covers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-cover-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Cover', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img',
            'title',
            'text',
            'button_text',
            //'button_link',
            //'button_bg_color',
            //'button_text_color',
            //'block_margin_top',
            //'block_margin_bottom',
            //'title_color',
            //'text_color',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockCover $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
