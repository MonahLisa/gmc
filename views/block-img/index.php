<?php

use app\models\BlockImg;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockImgSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Imgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-img-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Img', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'img',
            'block_margin_top',
            'block_margin_bottom',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockImg $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
