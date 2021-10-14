<?php

use yii\helpers\Url;
?>
<a href="javascript:void(0);">
    <?php if (Yii::$app->language === 'ru'): ?>
        <span class="icon-country"><img src="/images/russian.png" alt="ru"></span>Русский
    <?php else: ?>
        <span class="icon-country"><img src="/images/kz.png" alt="kz"></span>Қазақша
    <?php endif; ?>
</a>
<ul class="dropdown-menu alt-font">
    <li><a href="<?= Url::to([Yii::$app->controller->route, 'language' => 'kz']) ?>" title="Қазақша"><span class="icon-country"><img src="/images/kz.png" alt="kz"></span>Қазақша</a></li>
    <li><a href="<?= Url::to([Yii::$app->controller->route, 'language' => 'ru']) ?>" title="Русский"><span class="icon-country"><img src="/images/russian.png" alt="ru"></span>Русский</a></li>
</ul>