<?php

use yii\helpers\Url;
?>
<div class="header-language dropdown d-lg-inline-block">
    <a href="javascript:void(0);"><i class="feather icon-feather-globe"></i></a>
    <ul class="dropdown-menu alt-font">
        <li><a href="<?= Url::to([Yii::$app->controller->route, 'language' => 'kz']) ?>" title="English"><span class="icon-country"><img src="/images/kz.png" alt=""></span>Қазақша</a></li>
        <li><a href="<?= Url::to([Yii::$app->controller->route, 'language' => 'ru']) ?>" title="Russian"><span class="icon-country"><img src="/images/russian.png" alt=""></span>Русский</a></li>
    </ul>
</div>
