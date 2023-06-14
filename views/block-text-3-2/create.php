<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlockText32 $model */

$this->title = 'Добавить блок';
//$this->params['breadcrumbs'][] = ['label' => 'Block Text32s', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$page_id = $_GET['page_id'];
?>
<div class="block-text32-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="http://gmc-rosstata/web/page/view?id=<?php echo $page_id; ?>">Вернуться на страницу</a>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
