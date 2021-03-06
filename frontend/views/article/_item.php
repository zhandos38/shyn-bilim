<?php
/* @var $model \common\models\Article */
?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= "$model->name $model->surname $model->patronymic" ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $model->topic ?></h6>
    </div>
    <div class="card-footer">
        <small class="text-muted"><i class="fa fa-calendar"></i> <?= date('d.m.Y', $model->created_at) ?></small>
        <a href="<?= $model->getFile() ?>" class="btn btn-primary pull-right">Жүктеу</a>
    </div>
</div>
