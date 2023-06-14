<?php

use app\models\BlockImgText2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText2Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Img Text2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-img-text2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Img Text2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img1',
            'img2',
            'title',
            'title2',
            //'text',
            //'text2',
            //'block_margin_top',
            //'block_margin_bottom',
            //'title_color',
            //'text_color',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockImgText2 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
