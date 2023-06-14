<?php

use app\models\BlockText;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockTextSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Block Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-text-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Text', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text',
            'text_color',
            'block_margin_top',
            'block_margin_bottom',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlockText $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
