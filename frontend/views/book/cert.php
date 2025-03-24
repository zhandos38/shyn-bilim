<?php

use yii\helpers\Url;

/* @var $assignment Int */
?>
<div id="test" class="pb--60 pt--60">
    <div class="container test-app__container">
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/book/get-cert', 'assignment' => $assignment]) ?>">
                <?= Yii::t('app', 'Получить сертификат/диплом') ?>
            </a>
        </div>
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/book/get-cert-thank', 'assignment' => $assignment]) ?>">
                <?= Yii::t('app', 'Получить благодарственное письмо родителю') ?>
            </a>
        </div>
    </div>
</div>
