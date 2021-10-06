<?php
use yii\helpers\Url;
?>
<ul class="navbar-nav alt-font">
    <li class="nav-item dropdown megamenu">
        <a href="/" class="nav-link">Главная</a>
    </li>
    <li class="nav-item dropdown simple-dropdown">
        <a href="<?= Url::to(['about/index']) ?>" class="nav-link">О нас</a>
        <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
        <ul class="dropdown-menu" role="menu">
            <li class="dropdown">
                <a href="<?= Url::to(['about/index']) ?>"><?= Yii::t('app', 'Редакция') ?></a>
            </li>
            <li class="dropdown">
                <a href="<?= Url::to(['about/education-center']) ?>"><?= Yii::t('app', 'Учебный центр') ?></a>
            </li>
            <li class="dropdown">
                <a href="<?= Url::to(['about/printing']) ?>"><?= Yii::t('app', 'Полиграфия') ?></a>
            </li>
            <li class="dropdown">
                <a href="<?= Url::to(['about/photo-studio']) ?>"><?= Yii::t('app', 'Фотостудия') ?></a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown megamenu">
        <a href="<?= Url::to(['magazine/index']) ?>" class="nav-link"><?= Yii::t('app', 'Журнал') ?></a>
    </li>
    <li class="nav-item dropdown megamenu">
        <a href="<?= Url::to(['article/index']) ?>" class="nav-link"><?= Yii::t('app', 'Опубликовать материал') ?></a>
    </li>
    <li class="nav-item dropdown megamenu">
        <a href="<?= Url::to(['olympiad/index']) ?>" class="nav-link"><?= Yii::t('app', 'Олимпиада') ?></a>
    </li>
    <li class="nav-item dropdown megamenu">
        <a href="#" class="nav-link"><?= Yii::t('app', 'Марафон') ?></a>
    </li>
    <li class="nav-item dropdown megamenu">
        <a href="<?= Url::to(['site/contact']) ?>" class="nav-link"><?= Yii::t('app', 'Контакты') ?></a>
    </li>
</ul>