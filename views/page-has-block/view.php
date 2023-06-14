<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PageHasBlock $model */

$this->title = 'Удаление блока';
//$this->params['breadcrumbs'][] = ['label' => 'Page Has Blocks', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="page-has-block-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="http://gmc-rosstata/web/page/view?id=<?php echo $model->page_id; ?>">Вернуться на страницу</a>
    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'page_id',
//            'cover_block_id',
//            'title_block_id',
//            'text_block_id',
//            'text_3_1_block_id',
//            'text_3_2_block_id',
//            'text_2_1_block_id',
//            'text_2_2_block_id',
//            'img_block_id',
//            'img_text_1_block',
//            'img_text_2_block',
//            'img_text_3_block',
//            'img_text_4_block',
//            'gallery_block_id',
//            'video_block',
//            'slider_block',
//            'number',
        ],
    ]) ?>

</div>
