<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockImg $model */

$this->title = 'Изменить блок номер ' . $model->id;
$page_id = $_GET['page_id'];
?>
<div class="block-img-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="/web/page/view?id=<?php echo $page_id; ?>">Вернуться на страницу</a>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
