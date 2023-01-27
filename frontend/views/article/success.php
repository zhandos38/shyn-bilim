<?php
?>
<div class="row">
    <div class="col-md-12">
        <div style="text-align: center">
            <h2><?= Yii::t('app', 'Ваш материал успешно опубликован!') ?></h2>
            <br>
            <a class="btn btn-success" href="<?= \yii\helpers\Url::to(['article/cert', 'id' => $id]) ?>">
                <?= Yii::t('app', 'Получить сертификат') ?>
            </a>
            <br>
            <a class="btn btn-success" href="<?= \yii\helpers\Url::to(['article/charter', 'id' => $id]) ?>">
                <?= Yii::t('app', 'Получить грамоту') ?>
            </a>
        </div>
    </div>
</div>
