
<?php
/**
 * @var $model News
 * @var $user_model User
 */

use app\models\News;
use app\models\User;


?>




    <a href="news-item?id=<?= $model->id ?>" class="ag-news-item_link">
        <div class="ag-news-item_bg"></div>

        <div class="ag-news-item_title">
            <?= $model->title ?>
        </div>
        <div class="ag-news-item_date-box">
          <span class="ag-news-item_date">
            <?= (new DateTime($model->created_at))->format('d.m.Y'); ?>
          </span>
        </div>
    </a>
