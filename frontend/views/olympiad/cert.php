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
    </div>
</div>