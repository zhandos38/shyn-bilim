<?php
?>
<div class="container rbt-section-gapTop rbt-section-gapBottom">
    <div class="row">
        <div class="col-md-12">
            <div style="text-align: center">
                <h2><?= Yii::t('app', 'Ваш материал успешно опубликован!') ?></h2>
                <div>
                    <a class="rbt-btn btn-gradient" href="<?= \yii\helpers\Url::to(['article/cert', 'id' => $id]) ?>" target="_blank">
                        <?= Yii::t('app', 'Получить сертификат') ?>
                    </a>
                </div>
                <div class="mt--10">
                    <a class="rbt-btn btn-gradient" href="<?= \yii\helpers\Url::to(['article/charter', 'id' => $id]) ?>" target="_blank">
                        <?= Yii::t('app', 'Получить грамоту') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>