<?php

use app\models\NavbarItem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\NavbarItemSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Меню';
?>
<div class="navbar-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пункт меню', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Создать список', ['create-dropdown'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $menu = NavbarItem::find()->all();

    for($i = 1; $i <= count($menu); $i++){
        $menu_item = NavbarItem::findOne(['number' => $i]);
        if($menu_item->nav_item_text != null){

    ?>
        <div style="margin-bottom: 5vh;">
            <div style="display: flex; flex-direction: row; justify-content: flex-start; gap: 15px;">

                <div class="block-arrows">
                    <?php
                    if($menu_item->number != 1){
                        ?>
                        <a href="arrowup?num=<?php echo $menu_item->number; ?>">
                            <img src="../../web/img/icons/chevron-up.svg">
                        </a>
                        <?php
                    }
                    ?>
                    <?php
                    $last_el_id = NavbarItem::find()->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = NavbarItem::findOne(['id' => $last_el_id['id']]);
                    if($menu_item->number != $last_el->number){
                        ?>
                        <a href="arrowdown?num=<?php echo $menu_item->number; ?>">
                            <img src="../../web/img/icons/chevron-down.svg">
                        </a>
                        <?php
                    }
                    ?>

                </div>


                <p><?php echo $menu_item->nav_item_text; ?></p>


                <?php if($menu_item->nav_item_link === '#'){ ?>
                    <a href="add-link?id=<?php echo $menu_item->id; ?>"><img src="../../web/img/icons/link-2.svg"></a>
                <?php }else{ ?>
                    <a href="add-link?id=<?php echo $menu_item->id; ?>"><img src="../../web/img/icons/link-2-active.svg"></a>
                <?php }?>

                <?php if($menu_item->nav_item_page_id == null){ ?>
                    <a href="add-page?id=<?php echo $menu_item->id; ?>"><img src="../../web/img/icons/layers.svg"></a>
                <?php }else{ ?>
                    <a href="add-page?id=<?php echo $menu_item->id; ?>"><img src="../../web/img/icons/layers-active.svg"></a>
                <?php }?>




            </div>

            </div>
    <?php

    }else{
            ?>
            <div style="margin-bottom: 5vh;">

                <div class="block-arrows">
                    <?php
                    if($menu_item->number != 1){
                        ?>
                        <a href="arrowup?num=<?php echo $menu_item->number; ?>">
                            <img src="../../web/img/icons/chevron-up.svg">
                        </a>
                        <?php
                    }
                    ?>
                    <?php
                    $last_el_id = NavbarItem::find()->orderBy(['number'=> SORT_DESC])->one();
                    $last_el = NavbarItem::findOne(['id' => $last_el_id]);
                    if($menu_item->number != $last_el->number){
                        ?>
                        <a href="arrowdown?num=<?php echo $menu_item->number; ?>">
                            <img src="../../web/img/icons/chevron-down.svg">
                        </a>
                        <?php
                    }
                    ?>
                    <p><?php echo $menu_item->dropdown_text; ?></p>
                </div>


                <div style="padding-left: 10px">
                    <?php
                    $dropdown_items = \app\models\NavDropdown::findAll(['nav_item_id' => $menu_item->id]);

                    for($j = 1; $j <= count($dropdown_items); $j++){
                        $item2 = \app\models\NavDropdown::findOne(['number' => $j, 'nav_item_id' => $menu_item->id]);

                        ?>
                            <div style="display: flex; flex-direction: row; justify-content: flex-start; gap: 15px;">
                                <div class="block-arrows">
                                    <?php
                                    if($item2->number != 1){
                                        ?>
                                        <a href="/web/nav-dropdown/arrowup?num=<?php echo $item2->number; ?>&nav_item_id=<?php echo $item2->nav_item_id; ?>">
                                            <img src="../../web/img/icons/chevron-up.svg">
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $last_el_id = \app\models\NavDropdown::find()->where(['nav_item_id' =>$menu_item->id])->orderBy(['number'=> SORT_DESC])->one();

                                    $last_el = \app\models\NavDropdown::findOne(['id' => $last_el_id['id'], 'nav_item_id' =>$menu_item->id]);

                                    if($item2->number != $last_el->number){
                                        ?>
                                        <a href="/web/nav-dropdown/arrowdown?num=<?php echo $item2->number; ?>&nav_item_id=<?php echo $item2->nav_item_id; ?>">
                                            <img src="../../web/img/icons/chevron-down.svg">
                                        </a>
                                        <?php
                                    }
                                    ?>

                                </div>

                                <p><?php echo $item2->item_text; ?></p>


                                <?php
//                                var_dump($item2->item_link === '#');
                                if($item2->item_link === '#'){ ?>
                                <a href="/web/nav-dropdown/add-link?id=<?php echo $item2->id; ?>"><img src="../../web/img/icons/link-2.svg"></a>
                                <?php }else{ ?>
                                    <a href="/web/nav-dropdown/add-link?id=<?php echo $item2->id; ?>"><img src="../../web/img/icons/link-2-active.svg"></a>
                                <?php }?>

                                <?php if($item2->item_page_id == null){ ?>
                                    <a href="/web/nav-dropdown/add-page?id=<?php echo $item2->id; ?>"><img src="../../web/img/icons/layers.svg"></a>
                                <?php }else{ ?>
                                    <a href="/web/nav-dropdown/add-page?id=<?php echo $item2->id; ?>"><img src="../../web/img/icons/layers-active.svg"></a>
                                <?php }?>


                            </div>


                        <?php

                    }


                    ?>

                    <a href="/web/nav-dropdown/create?id=<?php echo $menu_item->id; ?>"><img src="../../web/img/icons/plus-circle.svg"></a>
                </div>
            </div>
            <?php
        }


    }

    ?>


</div>
