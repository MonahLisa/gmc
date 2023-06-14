<?php

use app\models\NavbarItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NavbarItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$accordion_id = $_GET['id'];
$accordion_items = \app\models\BlockAccordionItem::findAll(['block_accordion_id'=>$accordion_id]);
$this->title = 'Аккордеон №'.$accordion_id;
?>
<div class="navbar-item-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <a href="/web/block-accordion-item/create?id=<?php echo $accordion_id ?>" class="btn btn-primary">Создать пункт аккордеона</a>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php


    foreach($accordion_items as $accordion_item){

            ?>
            <div style="margin-bottom: 5vh;">

                <div style="display: flex; flex-direction: row; gap: 10px">

                    <p><?php echo $accordion_item->title; ?></p>
                    <a href="/web/block-accordion-item/update?id=<?php echo $accordion_item->id; ?>"><img src="/web/img/icons/edit.svg"></a>
                </div>


                <div style="padding-left: 10px">
                    <?php
                    $accordion_item_contents = \app\models\BlockAccordionItemContent::findAll(['block_accordion_item_id'=>$accordion_item->id]);

                    foreach($accordion_item_contents as $accordion_item_content){

                        ?>
                        <div style="display: flex; flex-direction: row; justify-content: flex-start; gap: 15px;">
                            <?php if($accordion_item_content->item_text != null){ ?>
                            <p><?php echo $accordion_item_content->item_text; ?></p>
                            <?php }else{
                                $doc = \app\models\Docs::findOne(['id' => $accordion_item_content->doc_id]);
                                ?>
                             <a href="/web/uploads/documents/<?php echo $doc->doc; ?>"><?php echo $accordion_item_content->doc_text; ?></a>
                            <?php } ?>


                            <?php
                            //                                var_dump($item2->item_link === '#');
                            if($accordion_item_content->item_text === null){ ?>
                                <a href="/web/block-accordion-item-content/update-text?id=<?php echo $accordion_item_content->id; ?>"><img src="/web/img/icons/edit.svg"></a>
                            <?php }else{ ?>
                                <a href="/web/block-accordion-item-content/update-text?id=<?php echo $accordion_item_content->id; ?>"><img src="/web/img/icons/edit-active.svg"></a>
                            <?php }?>

                            <?php if($accordion_item_content->doc_id == null){ ?>
                                <a href="/web/block-accordion-item-content/update?id=<?php echo $accordion_item_content->id; ?>"><img src="/web/img/icons/file.svg"></a>
                            <?php }else{ ?>
                                <a href="/web/block-accordion-item-content/update?id=<?php echo $accordion_item_content->id; ?>"><img src="/web/img/icons/file-active.svg"></a>
                            <?php }?>


                        </div>


                        <?php

                    }


                    ?>


                <div style="display: flex; flex-direction: row; gap: 10px">
                    <a href="/web/block-accordion-item-content/create?id=<?php echo $accordion_item->id; ?>">
                        <img src="/web/img/icons/file.svg">
                    </a>

                    <a href="/web/block-accordion-item-content/create-text?id=<?php echo $accordion_item->id; ?>">
                        <img src="/web/img/icons/edit.svg">
                    </a>

                </div>


                </div>
            </div>
            <?php

    }

    ?>


</div>
