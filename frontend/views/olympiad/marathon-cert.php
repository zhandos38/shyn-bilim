<?php

use yii\helpers\Url;

/* @var $assignment integer */
?>
<div id="test" class="pb--60 pt--60">
    <div class="container test-app__container">
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/olympiad/get-cert', 'id' => $assignment]) ?>" download>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="!isSent"></span>
                <?= Yii::t('app', 'Получить сертификат/диплом') ?>
            </a>
        </div>
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/olympiad/get-cert-thank-leader', 'id' => $assignment]) ?>" download>
                <?= Yii::t('app', 'Получить грамоту преподавателя') ?>
            </a>
        </div>
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/olympiad/get-cert-thank-parent', 'id' => $assignment]) ?>" download>
                <?= Yii::t('app', 'Получить благодарственное письмо родителю') ?>
            </a>
        </div>
    </div>
</div>