<?php

use yii\helpers\Url;
?>
<ul class="rbt-dropdown-menu switcher-language">
    <li class="has-child-menu">
        <?php if (Yii::$app->language === 'ru'): ?>
            <a href="#">
                <img class="left-image" src="/img/ru.png" alt="Language Images">
                <span class="menu-item">Русский</span>
                <i class="right-icon feather-chevron-down"></i>
            </a>
        <?php else: ?>
            <a href="#">
                <img class="left-image" src="/img/kz.png" alt="Language Images">
                <span class="menu-item">Қазақша</span>
                <i class="right-icon feather-chevron-down"></i>
            </a>
        <?php endif; ?>
        <ul class="sub-menu">
            <li>
                <?php if (Yii::$app->language === 'ru'): ?>
                    <a href="<?= Url::to([Yii::$app->controller->route, 'language' => 'kz']) ?>">
                        <img class="left-image" src="/img/kz.png" alt="Language Images">
                        <span class="menu-item">Қазақша</span>
                    </a>
                <?php else: ?>
                    <a href="<?= Url::to([Yii::$app->controller->route, 'language' => 'ru']) ?>">
                        <img class="left-image" src="/img/ru.png" alt="Language Images">
                        <span class="menu-item">Русский</span>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </li>
</ul>