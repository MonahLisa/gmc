<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\NavDropdown $model */

$this->title = 'Создать пункт выпадающего списка';
$this->params['breadcrumbs'][] = ['label' => 'Nav Dropdowns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nav-dropdown-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
