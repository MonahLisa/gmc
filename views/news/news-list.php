<?php

use app\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\News $model */
$this->title = 'Редактирование новостей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <a href="create" class="btn btn-primary">Добавить новость</a>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y'],
                'filter' => Html::input('date', 'created_at'),
//                'filter' => function ($model) {
//                    return Html::input('date', 'created_at', $model->news->created_at);
//                }
            ],
//            [
//                'attribute' => 'company_id',
//                'value' => function ($model) {
//                    return Html::a($model->company->name, Url::to(['product/view', 'id' => $model->id]));
//                },
//                'format' => 'html',
//                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name')
//            ],
            [
                'format' => 'raw',
                'value' => function($data) {
                    $buttons = '';
                    $buttons .= Html::a('<img class="icon-hover" style="width: 20px" src="/web/img/icons/eye.svg">', '/web/news/view?id=' . $data['id'], ['title'=>'Просмотр']) . ' ';
                    $buttons .= Html::a('<img class="icon-hover" style="width: 20px" src="/web/img/icons/file-text.svg">', '/web/news-has-notification/create?id=' . $data['id'], ['data-method'=>"post", 'title'=>'Добавить извещение']) . ' ';
                    $buttons .= Html::a('<img class="icon-hover" style="width: 20px" src="/web/img/icons/file_blue.svg">', '/web/news-has-doc/create?id=' . $data['id'], ['data-method'=>"post", 'title'=>'Добавить файл']) . ' ';



                    return $buttons;
                }
            ],
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, News $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                }
//            ],
        ],
    ]); ?>


</div>
