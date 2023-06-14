<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText1 $model */

$this->title = 'Изменить блок номер ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Block Img Text1s', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
$page_id = $_GET['page_id'];
?>
<div class="block-img-text1-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="/web/page/view?id=<?php echo $page_id; ?>">Вернуться на страницу</a>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
