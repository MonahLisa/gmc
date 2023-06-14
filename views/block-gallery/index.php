<?php

use app\models\BlockGallery;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockGallerySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Gallery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'block_margin_top',
            'block_margin_bottom',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockGallery $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
