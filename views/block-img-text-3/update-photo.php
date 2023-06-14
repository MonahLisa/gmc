<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText3 $model */
/** @var yii\widgets\ActiveForm $form */

/** @var yii\web\View $this */
/** @var app\models\BlockImgText3 $model */

$this->title = 'Изменить фото блока ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Block Img Text3s', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
$page_id = $_GET['page_id'];
?>
<div class="block-img-text3-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <a href="/web/page/view?id=<?php echo $page_id; ?>">Вернуться на страницу</a>

    <div class="block-img-text3-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'img')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
