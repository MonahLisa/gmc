<?php

use app\models\PageHasBlock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PageHasBlockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Page Has Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-has-block-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Page Has Block', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_id',
            'cover_block_id',
            'title_block_id',
            'text_block_id',
            //'text_3_1_block_id',
            //'text_3_2_block_id',
            //'text_2_1_block_id',
            //'text_2_2_block_id',
            //'img_block_id',
            //'img_text_1_block',
            //'img_text_2_block',
            //'img_text_3_block',
            //'img_text_4_block',
            //'gallery_block_id',
            //'video_block',
            //'slider_block',
            //'number',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PageHasBlock $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
