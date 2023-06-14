<?php

use app\models\BlockText21;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockText21Search $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Text21s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-text21-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Text21', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'main_title',
            'second_title_1',
            'second_title_2',
            'text1',
            //'text2',
            //'main_title_color',
            //'second_title_color',
            //'text_color',
            //'block_margin_top',
            //'block_margin_bottom',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockText21 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
