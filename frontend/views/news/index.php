<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Новости');
?>
<div class="news-index">
    <h1><?= $this->title ?></h1>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item'
    ]) ?>
</div>
