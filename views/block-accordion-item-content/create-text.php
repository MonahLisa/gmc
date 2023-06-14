<?php
use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/** @var yii\web\View $this */
/** @var app\models\BlockAccordionItemContent $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Создать текст в пункте аккордеона';
//$this->params['breadcrumbs'][] = ['label' => 'Block Accordion Item Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-accordion-item-content-create-text">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="block-accordion-item-content-form">

        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'item_text')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'plugins' => [
                    'clips',
                    'fullscreen',
                ],
                'clips' => [
                    ['Lorem ipsum...', 'Lorem...'],
                    ['red', '<span class="label-red">red</span>'],
                    ['green', '<span class="label-green">green</span>'],
                    ['blue', '<span class="label-blue">blue</span>'],
                ],
            ],
        ]);?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
