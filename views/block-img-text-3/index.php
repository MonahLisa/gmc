<?php

use app\models\BlockImgText3;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText3Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Img Text3s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-img-text3-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Img Text3', ['create'], ['class' => 'btn btn-success']) ?>
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
            'block_margin_top',
            //'block_margin_bottom',
            //'title_color',
            //'text_color',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockImgText3 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
