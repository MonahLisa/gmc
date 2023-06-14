<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Регистрация';

?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Пожалуйста, заполните форму для прохождения регистрации:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>
            <?= $form->field($model, 'login')->textInput(['autofocus' => true, 'class' => 'form-control form-control-lg', 'placeholder' => 'Логин'])->label(''); ?>
            <?= $form->field($model, 'name')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Имя'])->label(''); ?>
            <?= $form->field($model, 'patronymic')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Отчество'])->label(''); ?>
            <?= $form->field($model, 'surname')->textInput(['class' => 'form-control form-control-lg', 'placeholder' => 'Фамилия'])->label(''); ?>
            <?= $form->field($model, 'email')->textInput(['class' => 'form-control form-control-lg', 'type' => 'email', 'placeholder' => 'Почта'])->label(''); ?>
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg form-primary', 'placeholder' => 'Пароль'])->label(''); ?>

            <?= $form->field($model, 'password_repeat')->passwordInput(['class' => 'form-control form-control-lg form-primary', 'placeholder' => 'Повторите пароль'])->label(''); ?>
            <?= $form->field($model, 'agree')->checkbox() ?>

            <?php


            ?>

            <div class="d-grid gap-2">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?php echo '<button id="button-reg"  onclick="window.location=\'login\'" class="btn btn-outline-primary">Авторизация</button>'; ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
