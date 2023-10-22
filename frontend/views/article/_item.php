<?php
/* @var $model \common\models\Article */
?>
<div class="card">
    <h6 class="card-header">
        <?= "$model->name $model->surname $model->patronymic" ?>
    </h6>
    <div class="card-body">
        <h5 class="card-title"><?= $model->topic ?></h5>
        <p class="card-text"><i class="fa fa-calendar"></i> <?= date('d.m.Y', $model->created_at) ?></p>
        <a href="<?= $model->getFile() ?>" class="rbt-btn-link"><?= Yii::t('app', 'Скачать') ?></a>
    </div>
</div>
