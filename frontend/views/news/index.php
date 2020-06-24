<?php
/* @var $this \yii\web\View */

$this->title = Yii::t('app', 'Новости');
?>
<div class="news-index">
    <h1 class="site-title"><?= $this->title ?></h1>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => '{items}',
        'options' => [
            'class' => 'articles-list articles'
        ],
        'itemOptions' => [
            'class' => 'article-block'
        ]
    ]) ?>
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination
    ]) ?>
</div>
