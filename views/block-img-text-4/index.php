<?php

use app\models\BlockImgText4;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText4Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Img Text4s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-img-text4-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Img Text4', ['create'], ['class' => 'btn btn-success']) ?>
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
            //'button_text1',
            //'button_text2',
            //'button_link1',
            //'button_link2',
            //'button_text_color',
            //'button_bg_color',
            //'title_color',
            //'text_color',
            //'block_margin_top',
            //'block_margin_bottom',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockImgText4 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
