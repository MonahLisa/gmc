<?php
use app\models\Page;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
$this->title = 'Блоки';
$text_blocks = \app\models\BlockText::find()->all();
$page_id = $_GET['page_id'];

?>
<style>
    .block-img{
        width: 100%;
        box-shadow: 0px 0px 25px 1px rgba(0, 0, 0, 0.15);
        margin-bottom: 12vh;
    }
</style>



<h1>Блоки</h1>

<h3 style="margin-bottom: 5vh; margin-top: 8vh;">Текстовые блоки</h3>

<h4>Заголовок</h4>
<a href="#"><img class="block-img" src="/web/img/blocks/title.png" alt=""></a>

<h4>Текст</h4>
<a href="/web/block-text/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/textt.png" alt=""></a>

<h4>Текст две колонки 1</h4>
<a href="/web/block-text-2-1/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/text_2_1.png" alt=""></a>

<h4>Текст две колонки 2</h4>
<a href="/web/block-text-2-2/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/text_2_2.png" alt=""></a>

<h4>Текст три колонки 1</h4>
<a href="/web/block-text-3-1/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/text_3_1.png" alt=""></a>

<h4>Текст три колонки 2</h4>
<a href="/web/block-text-3-2/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/text_3_2.png" alt=""></a>


<h3 style="margin-bottom: 5vh; margin-top: 8vh;">Блоки с текстом и картинками</h3>

<h4>Картинка + текст</h4>
<a href="/web/block-img-text-1/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/img_text_1.png" alt=""></a>

<h4>Картинки и текст в две колонки</h4>
<a href="/web/block-img-text-2/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/img_text_2.png" alt=""></a>

<h4>Картинка на ширину страницы и текст в две колонки</h4>
<a href="/web/block-img-text-3/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/img_text_3.png" alt=""></a>

<h4>Шахматка из картинок, текста и кнопок</h4>
<a href="/web/block-img-text-4/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/img_text_4.png" alt=""></a>


<h3 style="margin-bottom: 5vh; margin-top: 8vh;">Блоки с картинками</h3>
<h4>Картинка</h4>
<a href="/web/block-img/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/image.png" alt=""></a>

<h4>Слайдер</h4>
<a href="#"><img class="block-img" src="../../web/img/blocks/slider.png" alt=""></a>

<h4>Галерея</h4>
<a href="/web/block-gallery/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="/web/img/blocks/gallery.png" alt=""></a>


<h3 style="margin-bottom: 5vh; margin-top: 8vh;">Обложки</h3>
<h4>Обложка 1</h4>
<a href="/web/block-cover/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="../../web/img/blocks/cover.png" alt=""></a>


<h3 style="margin-bottom: 5vh; margin-top: 8vh;">Видео-блоки</h3>
<h4>Видео 1</h4>
<a href="#"><img class="block-img" src="../../web/img/blocks/video.png" alt=""></a>

<h3 style="margin-bottom: 5vh; margin-top: 8vh;">Другое</h3>
<h4>Аккордеон</h4>
<a href="/web/block-accordion/create?page_id=<?php echo $page_id; ?>"><img class="block-img" src="../../web/img/blocks/video.png" alt=""></a>

























