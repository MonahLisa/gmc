<?php

use app\models\NewsHasDoc;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NewsHasDocSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'News Has Docs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-has-doc-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News Has Doc', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'news_id',
            'doc_id',
            'main',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, NewsHasDoc $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
