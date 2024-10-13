<?php

use common\models\Olympiad;
use yii\helpers\Url;

/* @var $testAssignment \common\models\TestAssignment */
?>
<div id="test" class="pb--60 pt--60">
    <div class="container test-app__container">
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/olympiad/get-cert', 'id' => $testAssignment->id]) ?>">
                <?= Yii::t('app', 'Получить сертификат/диплом') ?>
            </a>
        </div>
        <?php if ($testAssignment->olympiad->type === Olympiad::TYPE_STUDENT): ?>
        <div class="mt--10">
            <a class="rbt-btn btn-gradient" href="<?= Url::to(['/olympiad/get-cert-thank-leader', 'id' => $testAssignment->id]) ?>">
                <?= Yii::t('app', 'Получить грамоту преподавателя') ?>
            </a>
        </div>
            <?php if ($testAssignment->olympiad->id === 19): ?>
            <div class="mt--10">
                <a class="rbt-btn btn-gradient" href="<?= Url::to(['/olympiad/get-cert-thank-parent', 'id' => $testAssignment->id]) ?>">
                    <?= Yii::t('app', 'Получить благодарственное письмо родителю') ?>
                </a>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>