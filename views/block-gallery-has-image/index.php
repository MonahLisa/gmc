<?php

use app\models\BlockGalleryHasImage;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlockGalleryHasImageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$gallery_id = $_GET['id'];
$gallery = \app\models\BlockGallery::findOne(['id'=>$gallery_id]);


$this->title = 'Фотографии галереи №'.$gallery->id;
$this->params['breadcrumbs'][] = $this->title;

$gallery_items = BlockGalleryHasImage::find()->where(['block_gallery_id' => $gallery->id])->all();
?>
<div class="block-gallery-has-image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Block Gallery Has Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div>
    <?php

    for($i = 1; $i <= count($gallery_items); $i++){
        $gallery_item = BlockGalleryHasImage::findOne(['number' => $i, 'block_gallery_id' => $gallery_id]);
        ?>
        <div>

            <div style="display: flex; flex-direction: row; align-items: center; margin: 5vh 0; gap: 3%;">
                <a rel="iLoad" href='/web/uploads/gallery_block/<?php echo $gallery_item['url']; ?>'><img style="width:100px; height: 100px; object-fit: cover;" src='/web/uploads/gallery_block/<?php echo $gallery_item['url']; ?>' alt=''></a>
                <p><?php echo $gallery_item['url']; ?></p>
                <a href="/web/block-gallery-has-image/update?id=<?php echo $gallery_item['id']; ?>">
                    <img src="/web/img/icons/edit.svg">
                </a>
                <a href="/web/block-gallery-has-image/view?id=<?php echo $gallery_item['id']; ?>">
                    <img src="/web/img/icons/trash-2.svg">
                </a>

                <div class="block-arrows">
                    <?php
                    if($gallery_item['number'] != 1){
                        ?>
                        <a href="/web/block-gallery-has-image/arrowup?num=<?php echo $gallery_item['number']; ?>&gal_id=<?php echo $gallery_item['block_gallery_id']; ?>">
                            <img src="/web/img/icons/chevron-up.svg">
                        </a>
                        <?php
                    }
                    ?>
                    <?php
                    $last_el_id = BlockGalleryHasImage::find()->where(['block_gallery_id' => $gallery_item['block_gallery_id']])->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = BlockGalleryHasImage::findOne(['id' => $last_el_id]);
                    if($gallery_item['number'] != $last_el->number){
                        ?>
                        <a href="/web/block-gallery-has-image/arrowdown?num=<?php echo $gallery_item['number']; ?>&gal_id=<?php echo $gallery_item['block_gallery_id']; ?>">
                            <img src="/web/img/icons/chevron-down.svg">
                        </a>
                        <?php
                    }
                    ?>

                </div>
            </div>

        </div>
        <?php

    }
    ?>


</div>

    <?php
    if(Yii::$app->user->can('redactGMCPage')){
        ?>
        <div style="text-align: center"><h4>Добавить фото</h4><a href="create?gal_id=<?php echo $gallery_id; ?>"><img style="width: 8%;" src="/web/img/icons/plus-circle.svg"></a></div>
        <?php
    }
    ?>


</div>
