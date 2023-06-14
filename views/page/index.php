<?php

use app\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h3 style="margin-top: 10vh;">Существующие страницы</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $pages = Page::find()->all();
    foreach ($pages as $page){
        ?><a class="btn btn-primary" href="../page/view?id=<?php echo $page['id']; ?>"><?php echo $page['title']; ?></a>
        <?php
    }
    ?>


</div>
