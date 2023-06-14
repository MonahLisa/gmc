<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlockImgText1 $model */
/** @var yii\widgets\ActiveForm $form */

/** @var yii\web\View $this */
/** @var app\models\BlockImgText1 $model */

$this->title = 'Изменить фото блока ' . $model->id;

$page_id = $_GET['page_id'];
?>
    <div class="block-cover-update">

        <h1><?= Html::encode($this->title) ?></h1>
        <a href="/web/page/view?id=<?php echo $page_id; ?>">Вернуться на страницу</a>

        <div class="block-img-text1-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'img')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>



