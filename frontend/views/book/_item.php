<?php
use common\models\Book;

/* @var $model Book */
?>
<div class="magazine">
    <img class="magazine__image" src="<?= $model->getImage() ?>" alt="magazine-image">
    <div class="magazine__title"><?= $model->name ?></div>
    <div class="magazine__body">
        <div class="magazine__footer">
            <a href="<?= $model->getFile() ?>" class="magazine__download-link" download="<?= $model->file ?>"><i class="fa fa-download"></i> <?= Yii::t('app', 'Скачать') ?></a>
        </div>
    </div>
</div>