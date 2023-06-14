<?php

use app\models\BlockGalleryHasImage;
use app\models\PageHasBlock;
use yii\helpers\Html;
use yii\widgets\DetailView;
/** @var yii\web\View $this */
/** @var app\models\Page $model */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$page_id = $_GET['id'];
$page = \app\models\Page::findOne(['id' => $page_id]);
$page_blocks = \app\models\PageHasBlock::find()->where(['page_id' => $page_id])->all();
//$page_blocks_id = (new \yii\db\Query())
////    ->select(['id'])
//    ->select(['number'])
//    ->from('page_has_block')
//    ->where(['page_id' => $page_id])
//    ->createCommand();
//$page_blocks = $page_blocks_id->queryAll();

?>
<style>
    .block-panel{
        display: flex;
        justify-content: space-between;
    }
</style>


    <script>
        function unsecuredCopyToClipboard(text) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
            } catch (err) {
                console.error('Unable to copy to clipboard', err);
            }
            document.body.removeChild(textArea);
            alert('Ссылка страницы скопирована');
        }
    </script>

    <div class="page-content">
        <?php
//        foreach ($page_blocks as $page_block_id)

        for ($i = 1; $i <= count($page_blocks); $i++){



            $page_block = \app\models\PageHasBlock::findOne(['number' => $i, 'page_id' => $page_id]);


        ?>












            <?php
            if ($page_block->text_2_1_block_id != null){
                $block_model = \app\models\BlockText21::findOne(['id' => $page_block->text_2_1_block_id]);
            ?>
<!--                    Начало тела блока-->
                <div id="text-2-1-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                <?php
                if(Yii::$app->user->can('redactGMCPage')){
                ?>
<!--                        Панель блока-->
                    <div class="block-panel">
                        <a href="/web/block-text-2-1/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>"><img src="../../web/img/icons/edit.svg"></a>

                        <div class="block-arrows">
                            <?php
                            if($page_block->number != 1){
                            ?>
                            <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                <img src="../../web/img/icons/chevron-up.svg">
                            </a>
                            <?php
                            }
                            ?>
                            <?php
                            $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                            $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                            if($page_block->number != $last_el->number){
                            ?>
                            <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                <img src="../../web/img/icons/chevron-down.svg">
                            </a>
                            <?php
                            }
                            ?>

                        </div>

                        <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                    </div>
                    <?php
                }
                ?>
<!--                    Конец панели блока-->
                    <h2 style="color: <?php echo $block_model->main_title_color; ?>;"><?php echo $block_model->main_title; ?></h2>
                    <div class="two-col-wrapper">

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>;"><?php echo $block_model->second_title_1; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text1; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>;"><?php echo $block_model->second_title_2; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text2; ?>
                            </dl>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>















            <?php
            if ($page_block->text_block_id != null){
                $block_model = \app\models\BlockText::findOne(['id' => $page_block->text_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="text-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <a href="/web/block-text/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>"><img src="../../web/img/icons/edit.svg"></a>

                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <div style="color: <?php echo $block_model->text_color; ?>;"><?php echo $block_model->text; ?></div>
                </div>

                <?php
            }
            ?>















            <?php
            if ($page_block->text_2_2_block_id != null){
                $block_model = \app\models\BlockText22::findOne(['id' => $page_block->text_2_2_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="text-2-2-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <a href="/web/block-text-2-2/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>"><img src="../../web/img/icons/edit.svg"></a>

                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <div class="two-col-wrapper">
                        <div>
                            <h2 style="color: <?php echo $block_model->main_title_color; ?>;"><?php echo $block_model->main_title; ?></h2>
                        </div>

                        <div>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text1; ?>
                            </dl>
                        </div>

                    </div>
                </div>

                <?php
            }
            ?>
















            <?php
            if ($page_block->text_3_1_block_id != null){
                $block_model = \app\models\BlockText31::findOne(['id' => $page_block->text_3_1_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="text-3-1-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <a href="/web/block-text-3-1/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>"><img src="../../web/img/icons/edit.svg"></a>

                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <h2 style="color: <?php echo $block_model->main_title_color; ?>"><?php echo $block_model->main_title; ?></h2>
                    <div class="three-col-1-wrapper">

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_1; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text1; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_2; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text2; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_3; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text3; ?>
                            </dl>
                        </div>

                    </div>
                </div>

                <?php
            }
            ?>



















            <?php
            if ($page_block->text_3_2_block_id != null){
                $block_model = \app\models\BlockText32::findOne(['id' => $page_block->text_3_2_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="text-3-2-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <a href="/web/block-text-3-2/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>"><img src="../../web/img/icons/edit.svg"></a>

                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <h2 style="color: <?php echo $block_model->main_title_color; ?>"><?php echo $block_model->main_title; ?></h2>
                    <div class="three-col-2-wrapper">

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_1; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text1; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_2; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text2; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_3; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text3; ?>
                            </dl>
                        </div>

                    </div>
                    <div class="three-col-2-wrapper">

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_4; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text4; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_5; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text5; ?>
                            </dl>
                        </div>

                        <div>
                            <h4 style="color: <?php echo $block_model->second_title_color; ?>"><?php echo $block_model->second_title_6; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>">
                                <?php echo $block_model->text6; ?>
                            </dl>
                        </div>

                    </div>
                </div>

                <?php
            }
            ?>


















            <?php
            if ($page_block->img_text_1_block != null){
                $block_model = \app\models\BlockImgText1::findOne(['id' => $page_block->img_text_1_block]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-text-1-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-img-text-1/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg" alt="">
                                </a>

                                <a href="/web/block-img-text-1/update-photo?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/image.svg" alt="">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg" alt="">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <?php
                    if($block_model->img_orientation == 0){
                    ?>
                    <div class="img-text-1-block">
                        <img src="../../web/uploads/image/<?php echo $block_model->img; ?>" alt="Your Image">
                        <div>
                            <h2 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h2>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text; ?>
                            </dl>
                        </div>
                    </div>
                    <?php
                    }else{
                        ?>
                        <div class="img-text-1-block">

                            <div>
                                <h2 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h2>
                                <dl style="color: <?php echo $block_model->text_color; ?>;"><?php echo $block_model->text; ?></dl>
                            </div>
                            <img src="../../web/uploads/image/<?php echo $block_model->img; ?>" alt="Your Image">
                        </div>

                        <?php
                    }
                    ?>

                </div>



                <?php
            }
            ?>



















            <?php
            if ($page_block->img_text_2_block != null){
                $block_model = \app\models\BlockImgText2::findOne(['id' => $page_block->img_text_2_block]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-text-2-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-img-text-2/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg">
                                </a>
                                <a href="/web/block-img-text-2/update-photo?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/image.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->

                    <div class="two-col-wrapper">

                        <div>
                            <img style="width: 100%; margin-bottom: 3vh;" src="../../web/uploads/image/<?php echo $block_model->img1; ?>">
                            <h4 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text; ?>
                            </dl>
                        </div>

                        <div>
                            <img style="width: 100%; margin-bottom: 3vh;" src="../../web/uploads/image/<?php echo $block_model->img2; ?>">
                            <h4 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title2; ?></h4>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text2; ?>
                            </dl>
                        </div>

                    </div>
                </div>

                <?php
            }
            ?>















            <?php
            if ($page_block->img_text_3_block != null){
                $block_model = \app\models\BlockImgText3::findOne(['id' => $page_block->img_text_3_block]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-text-3-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-img-text-3/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg">
                                </a>
                                <a href="/web/block-img-text-3/update-photo?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/image.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->

                    <div class="two-col-wrapper">

                        <div>
                            <h2 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h2>
                        </div>

                        <div>
                            <dl style="color: <?php echo $block_model->text_color; ?>;">
                                <?php echo $block_model->text; ?>
                            </dl>
                        </div>

                    </div>
                    <img style="width: 100%;" src="../../web/uploads/image/<?php echo $block_model->img; ?>">
                </div>

                <?php
            }
            ?>

















            <?php
            if ($page_block->img_text_4_block != null){
                $block_model = \app\models\BlockImgText4::findOne(['id' => $page_block->img_text_4_block]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-text-4-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-img-text-4/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg">
                                </a>

                                <a href="/web/block-img-text-4/update-photo?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/image.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <?php
                    if($block_model->img_orientation == 0){
                        ?>
                        <div class="two-col-wrapper">
                            <div>
                                <img style="width: 100%" src="/web/uploads/image/<?php echo $block_model->img1; ?>" alt="Your Image">
                            </div>

                            <div>
                                <h3 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h3>
                                <dl style="color: <?php echo $block_model->text_color; ?>;">
                                    <?php echo $block_model->text; ?>
                                </dl>
                                <a class="block-btn" style="background-color: <?php echo $block_model->button_bg_color; ?>; color: <?php echo $block_model->button_text_color;?>;" href="<?php echo $block_model->button_link1; ?>">
                                    <?php echo $block_model->button_text1; ?>
                                </a>
                            </div>
                        </div>


                        <div class="two-col-wrapper">
                            <div>
                                <h3 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title2; ?></h3>
                                <dl style="color: <?php echo $block_model->text_color; ?>;">
                                    <?php echo $block_model->text2; ?>
                                </dl>
                                <a class="block-btn" style="background-color: <?php echo $block_model->button_bg_color; ?>; color: <?php echo $block_model->button_text_color;?>;" href="<?php echo $block_model->button_link2; ?>">
                                    <?php echo $block_model->button_text2; ?>
                                </a>
                            </div>

                            <div>
                                <img style="width: 100%" src="/web/uploads/image/<?php echo $block_model->img2; ?>" alt="Your Image">
                            </div>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="two-col-wrapper">

                            <div>
                                <h3 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h3>
                                <dl style="color: <?php echo $block_model->text_color; ?>;">
                                    <?php echo $block_model->text; ?>
                                </dl>
                                <a class="block-btn" style="background-color: <?php echo $block_model->button_bg_color; ?>; color: <?php echo $block_model->button_text_color;?>;" href="<?php echo $block_model->button_link1; ?>">
                                    <?php echo $block_model->button_text1; ?>
                                </a>
                            </div>

                            <div>
                                <img style="width: 100%" src="../../web/uploads/image/<?php echo $block_model->img1; ?>" alt="Your Image">
                            </div>
                        </div>


                        <div class="two-col-wrapper">
                            <div>
                                <img style="width: 100%" src="../../web/uploads/image/<?php echo $block_model->img2; ?>" alt="Your Image">
                            </div>

                            <div>
                                <h3 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title2; ?></h3>
                                <dl style="color: <?php echo $block_model->text_color; ?>;">
                                    <?php echo $block_model->text2; ?>
                                </dl>
                                <a class="block-btn" style="background-color: <?php echo $block_model->button_bg_color; ?>; color: <?php echo $block_model->button_text_color;?>;" href="<?php echo $block_model->button_link2; ?>">
                                    <?php echo $block_model->button_text2; ?>
                                </a>
                            </div>

                        </div>

                        <?php
                    }
                    ?>

                </div>



                <?php
            }
            ?>

















            <?php
            if ($page_block->gallery_block_id != null){
                $block_model = \app\models\BlockGallery::findOne(['id' => $page_block->gallery_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="gallery_block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-gallery/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="/web/img/icons/edit.svg">
                                </a>

                                <a href="/web/block-gallery-has-image/index?id=<?php echo $block_model->id; ?>">
                                    <img src="/web/img/icons/image.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="/web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="/web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>">
                                <img src="/web/img/icons/trash-2.svg">
                            </a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->

                    <?php
                    $gallery_items = BlockGalleryHasImage::find()->where(['block_gallery_id' => $block_model->id])->all();
                    ?>
                    <div class="gallery-container">
                        <?php

                        for($i = 1; $i <= count($gallery_items); $i++){
                            $gallery_item = BlockGalleryHasImage::findOne(['number' => $i, 'block_gallery_id' => $block_model->id]);
                        ?>
                        <div>
                            <a rel="iLoad" href='/web/uploads/gallery_block/<?php echo $gallery_item->url; ?>'><img class='gallery-item gallery-item-<?php echo $i; ?>' src='/web/uploads/gallery_block/<?php echo $gallery_item->url; ?>' alt=''></a>
                        </div>
                        <?php
                            }
                        ?>

                    </div>



                    <?php

                    ?>

                </div>



                <?php
            }
            ?>

























            <?php
            if ($page_block->img_block_id != null){
                $block_model = \app\models\BlockImg::findOne(['id' => $page_block->img_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-img/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg">
                                </a>

                                <a href="/web/block-img/update-photo?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/image.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <img style="width: 100%;" src="../../web/uploads/image/<?php echo $block_model->img; ?>">

                </div>



                <?php
            }
            ?>











            <?php
            if ($page_block->cover_block_id != null){
                $block_model = \app\models\BlockCover::findOne(['id' => $page_block->cover_block_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-cover/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg">
                                </a>

                                <a href="/web/block-cover/update-photo?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/image.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }
                    ?>
                    <!--                    Конец панели блока-->
                    <section class="cover_box">
                        <div class="cover-text">
                            <h1 style="color: <?php echo $block_model->title_color; ?>;"><?php echo $block_model->title; ?></h1>
                            <p style="color: <?php echo $block_model->text_color; ?>;"><?php echo $block_model->text; ?></p>

                            <?php if($block_model->button_text != ''){ ?>
                            <a class="block-btn" style="background-color: <?php echo $block_model->button_bg_color; ?>; color: <?php echo $block_model->button_text_color;?>;" href="<?php echo $block_model->button_link; ?>">
                                <?php echo $block_model->button_text; ?>
                            </a>
                            <?php } ?>
                        </div>
                        <img class="cover-img" src="/web/uploads/cover/<?php echo $block_model->img; ?>" alt="">

                    </section>




                </div>



                <?php
            }
            ?>














            <?php

            if ($page_block->accordion_id != null){
                $block_model = \app\models\BlockAccordion::findOne(['id' => $page_block->accordion_id]);
                ?>
                <!--                    Начало тела блока-->
                <div id="img-block-<?php echo $block_model->id; ?>" style="margin-top: <?php echo $block_model->block_margin_top; ?>vh; margin-bottom: <?php echo $block_model->block_margin_bottom; ?>vh;">
                    <?php
                    if(Yii::$app->user->can('redactGMCPage')){
                        ?>
                        <!--                        Панель блока-->
                        <div class="block-panel">
                            <div>
                                <a href="/web/block-accordion/update?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/edit.svg">
                                </a>
                                <a href="/web/block-accordion/update-accordion-list?id=<?php echo $block_model->id; ?>&page_id=<?php echo $page_block->page_id; ?>">
                                    <img src="../../web/img/icons/list.svg">
                                </a>
                            </div>
                            <div class="block-arrows">
                                <?php
                                if($page_block->number != 1){
                                    ?>
                                    <a href="/web/page-has-block/arrowup?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-up.svg">
                                    </a>
                                    <?php
                                }
                                ?>
                                <?php
                                $last_el_id = PageHasBlock::find()->where(['page_id' => $page_id])->orderBy(['number'=> SORT_DESC])->one();
                                $last_el = PageHasBlock::findOne(['id' => $last_el_id]);
                                if($page_block->number != $last_el->number){
                                    ?>
                                    <a href="/web/page-has-block/arrowdown?num=<?php echo $page_block->number; ?>&page=<?php echo $page_block->page_id; ?>">
                                        <img src="../../web/img/icons/chevron-down.svg">
                                    </a>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="/web/page-has-block/view?id=<?php echo $page_block->id; ?>"><img src="../../web/img/icons/trash-2.svg"></a>


                        </div>
                        <?php
                    }



                    $block_model_items = \app\models\BlockAccordionItem::findAll(['block_accordion_id'=>$block_model->id]);

                    ?>
                    <!--                    Конец панели блока-->


                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <?php
                        $count = 1;
                        foreach ($block_model_items as $block_model_item) {
                            if($count === 1){
                                $block_model_item_contents = \app\models\BlockAccordionItemContent::find()->where(['block_accordion_item_id'=>$block_model_item->id])->all();

                                ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <?php echo $block_model_item['title']; ?>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse<?php echo $count; ?>" class="accordion-collapse collapse show">
                                <div class="accordion-body">

                                    <?php foreach ($block_model_item_contents as $block_model_item_content) {
                                        if($block_model_item_content['item_text'] != ''){
                                            echo $block_model_item_content['item_text'];
                                        }else{
                                            $doc = \app\models\Docs::findOne(['id' => $block_model_item_content['doc_id']]);
                                            echo '<p><a href="/web/uploads/documents/'.$doc->doc.'">'.$block_model_item_content['doc_text'].'</a></p>';
                                        }


                                     } ?>
                                </div>
                            </div>
                        </div>

                        <?php
                                $count = $count + 1;
                            }else{

                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $count; ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            <?php echo $block_model_item['title']; ?>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse<?php echo $count; ?>" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <?php
                                            $block_model_item_contents = \app\models\BlockAccordionItemContent::find()->where(['block_accordion_item_id'=>$block_model_item['id']])->all();

                                            foreach ($block_model_item_contents as $block_model_item_content) {
                                                if($block_model_item_content['item_text'] != ''){
                                                    echo $block_model_item_content['item_text'];
                                                }else{
                                                    $doc = \app\models\Docs::findOne(['id' => $block_model_item_content['doc_id']]);
                                                    echo '<p><a href="/web/uploads/documents/'.$doc->doc.'">'.$block_model_item_content['doc_text'].'</a></p>';
                                                }


                                            }
                                            $count = $count + 1;
                                            ?>
                                        </div>
                                    </div>
                                </div>



                                <?php
                            }


                        }
                            ?>
                    </div>




                </div>



                <?php
            }
            ?>































            <?php
        }
        ?>
    </div>
<?php
if(Yii::$app->user->can('redactGMCPage')){
    ?>
    <div style="text-align: center"><h4>Добавить блок</h4><a href="../page/blocks?page_id=<?php echo $page_id; ?>"><img style="width: 8%;" src="../../web/img/icons/plus-circle.svg"></a></div>
    <?php
}
?>