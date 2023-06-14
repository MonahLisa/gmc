<?php

use app\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    /**
     * @var $data News[]
     */

    ?>

    <?php
    echo \yii\widgets\ListView::widget([
        'dataProvider' => $data,
        'itemView' => '_show_news_item',

        'itemOptions' => ["class" => "ag-news_item"],

    ]);
    ?>


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="pagination-container" style="display: flex; flex-direction: column; align-items: center">

</div>


</div>
<script>
    let summary = document.querySelector(".summary");
    summary.remove();

    let list_view = document.querySelector(".list-view");
    list_view.removeAttribute('class');
    list_view.setAttribute('class', 'ag-news_box');

    let prodCard = document.querySelector('.ag-news-item_bg');
    prodCard.classList.add("last-news");

    let pagination = document.querySelector('.pagination');

    let pagination2 = pagination;

    let pag_cont = document.querySelector('.pagination-container');
    pag_cont.append(pagination2);

    if(pag_cont.textContent === '\n\nnull'){
        pag_cont.classList.add('non-display');
    }
</script>