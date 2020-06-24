<?php
/* @var $this \yii\web\View */
/* @var $model \common\models\News */

$this->title = $model->title;
?>
<div class="news-view-date"><i class="fa fa-calendar"> <?= date('d.m.Y H:i', $model->created_at) ?></i></div>
<?= $model->content ?>
