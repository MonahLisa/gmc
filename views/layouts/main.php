<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\BootstrapIconAsset;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/images/icons/logo.svg')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="/web/css/profile-style.css">
    <link rel="stylesheet" type="text/css" href="/web/css/root.css">
    <link rel="stylesheet" type="text/css" href="/web/css/style.css">
    <link rel="stylesheet" type="text/css" href="/web/css/services.css">
    <link rel="stylesheet" type="text/css" href="/web/css/activities.css">
    <link rel="stylesheet" type="text/css" href="/web/css/news.css">
    <link rel="stylesheet" type="text/css" href="/web/css/administration-style.css">
    <link rel="stylesheet" type="text/css" href="/web/css/cover-style.css">
    <link rel="stylesheet" type="text/css" href="/web/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/web/css/block-styles.css">
    <link rel="stylesheet" type="text/css" href="/web/css/footer.css">




<!--    <link rel="stylesheet" type="text/css" href="../../web/css/gmc-page-normalize.css" />-->
<!--    <link rel="stylesheet" type="text/css" href="../../web/css/gmc-page-demo.css" />-->
<!--    <link rel="stylesheet" type="text/css" href="../../web/css/gmc-page-icons.css" />-->
<!--    <link rel="stylesheet" type="text/css" href="../../web/css/gmc-page-component.css" />-->
<!--    <script src="../../web/js/modernizr.custom.js"></script>-->
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>




<header id="header">

    <?php
    NavBar::begin([
        'brandLabel' => '<img style="width: 40px;" src="../../web/img/icons/logo.svg">',
        'brandUrl' => Yii::$app->homeUrl,

        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    ?>
    <ul id="w1" class="navbar-nav nav">

        <?php
        $menu_items = \app\models\NavbarItem::find()->all();
        for($i = 1; $i <= count($menu_items); $i++){
            $menu_item = \app\models\NavbarItem::findOne(['number' => $i]);
            if($menu_item->dropdown_text != null){
        ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $menu_item->dropdown_text; ?>
                    </a>
                    <ul class="dropdown-menu">

                        <?php
                        $dropdown_items = \app\models\NavDropdown::find()->where(['nav_item_id' => $menu_item->id])->all();
                        for($j = 1; $j <= count($dropdown_items); $j++){
                        $dropdown_item = \app\models\NavDropdown::findOne(['number' => $j, 'nav_item_id' => $menu_item->id]);
                        if($dropdown_item->item_page_id === null){
                        ?>
                            <li><a class="dropdown-item" href="<?php echo $dropdown_item->item_link; ?>"><?php echo $dropdown_item->item_text; ?></a></li>
                            <?php
                        }else{

                            ?>

                            <li><a class="dropdown-item" href="/web/page/view?id=<?php echo $dropdown_item->item_page_id; ?>"><?php echo $dropdown_item->item_text; ?></a></li>
                            <?php
                        }


                        }

                        ?>
                    </ul>
                </li>


        <?php
            }
            if($menu_item->nav_item_text != null){
                if($menu_item->nav_item_page_id === null){
                    ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $menu_item->nav_item_link; ?>"><?php echo $menu_item->nav_item_text; ?></a></li>

                    <?php
                }else{

                    ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $menu_item->nav_item_page_id; ?>"><?php echo $menu_item->nav_item_text; ?></a></li>

                    <?php
                }
            }


        }

        ?>

        </ul>

    <?php



    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Профиль', 'url' => ['/site/profile'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Админ-панель', 'url' => ['/site/admin'], 'visible' => Yii::$app->user->can('adminPanel')],
            Yii::$app->user->isGuest
                ? ['label' => 'Вход', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer-box">

    <div class="footer-content">

        <div class="footer-col-1"><p>ГМЦ Росстата - старейшее предприятие страны в области механизированной и автоматизированной обработки информации. Основное направление деятельности организации является сбор, обработка, анализ, распространение и представление статистической информации органам государственной власти и управления.</p></div>

        <div class="footer-col-2">
            <h4>Меню</h4>
            <a href="app/views/page?id="><p>О ГМЦ Росстата</p></a>
            <a href="app/views/page?id="><p>Противодействие коррупции</p></a>
            <a href="app/views/page?id="><p>Нам 90 лет!</p></a>
            <a href="app/views/page?id="><p>История в фотографиях</p></a>
            <a href=""><p>Новости</p></a>
            <a href=""><p>Услуги</p></a>
            <a href=""><p>Закупки</p></a>
        </div>

        <div class="footer-col-3">
            <h4>Наши контакты</h4>
            <div><p>105187, г.Москва, Измайловское шоссе, д.44</p></div>
            <div><p>+7 (495) 366-80-01</p></div>
            <div><p>gmc_info@gmcrosstata.ru</p></div>
        </div>

    </div>

    <div class="footer-under">
            <div>&copy; ГМЦ Росстата <?= date('Y') ?></div>
    </div>
</footer>

<script src="/web/assets/iload_3_3_5/iLoad.js"></script>

<script>
    let bread = document.querySelector('[aria-label="breadcrumb"]');
    bread.classList.add('bread-style');
</script>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
