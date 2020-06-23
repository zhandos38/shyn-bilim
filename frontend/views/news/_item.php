<?php
/* @var $model \common\models\News */

?>
<a href="<?= \yii\helpers\Url::to(['news/view', 'id' => $model->id]) ?>">
    <div class="article-block__preview">
        <img src="<?= $model->getImage() ?>" alt="<?= $model->title ?> title="<?= $model->title ?>">
    </div>
    <div class="article-block__description">
        <div class="article-block__title"><?= $model->title ?></div>
        <div class="article-block__bottom">
            <span class="date"><i class="fa fa-calendar"></i> 10.06.2020</span>
        </div>
    </div>
</a>