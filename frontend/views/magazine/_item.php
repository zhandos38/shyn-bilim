<?php
use common\models\Magazine;

/* @var $model Magazine */
?>
<div class="magazine">
    <img class="magazine__image" src="<?= $model->getImage() ?>" alt="magazine-image">
    <div class="magazine__title"># <?= $model->number ?></div>
    <div class="magazine__body">
        <div class="magazine__date">
            <i class="fa fa-calendar"></i> <?= date('d-m-Y', $model->created_at) ?>
        </div>
        <div class="magazine__footer">
            <a href="<?= Yii::$app->params['staticDomain'] . '/magazine/' . $model->file ?>" class="magazine__download-link" target="_blank"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
            <div class="magazine__buttons">
                <a class="magazine__share-link"><i class="fa fa-facebook"></i></a>
                <a class="magazine__share-link"><i class="fa fa-vk"></i></a>
                <a class="magazine__share-link"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </div>
</div>