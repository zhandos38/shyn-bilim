<?php

use common\models\Project;
use yii\helpers\Url;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/favicon.png']);
?>
<div class="qa-block rounded-circle shadow-lg">
    <a class="qa-block-link" href="<?= Url::to(['site/questions']) ?>">
        <img class="qa-block-img" src="/img/qa-img.png" alt="qa-img">
        <div><?= Yii::t('site', 'Көмек') ?></div>
    </a>
</div>
<!-- Start: Navigation Upper with Button -->
<div class="top-header">
    <div class="container">
        <div class="top-header__content">
            <div class="top-header__social-network">
                <a href="https://www.facebook.com/people/%D0%A8%D1%8B%D2%A3-%D0%91%D0%B0%D1%81%D0%BF%D0%B0%D1%85%D0%B0%D0%BD%D0%B0%D1%81%D1%8B-%D0%95%D1%81%D0%B5%D0%BD-%D0%91%D0%B0%D1%85%D1%8B%D1%82%D0%B3%D1%83%D0%BB/100009917714377"><i class="fa fa-facebook"></i></a>
                <a href="https://instagram.com/bilim.shyny?igshid=17e2qmrtscwpp"><i class="fa fa-instagram"></i></a>
                <a href="mailto:bilimshini.kz@mail.ru"><i class="fa fa-envelope"></i></a>
                <a href="tel:87750767876"><i class="fa fa-whatsapp"></i></a>
            </div>
            <div class="top-header__contact">
                <div class="navbar-email">
                    <i class="fa fa-envelope"></i> bilimshini.kz@mail.ru
                </div>
                <div class="navbar-button">
                    <?= $this->render('select-language') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Navigation Upper with Button -->
<!-- Start: Navigation with Button -->
<div class="navbar-wrapper">
    <div class="navbar navbar-expand-md" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="/"></a>
            <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
            <img class="navbar-mobile-title" src="/img/title.png" alt="title">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item navbar-mobile-button">
                        <div class="navbar-mobile-language">
                            <?= $this->render('select-language') ?>
                        </div>
                    </li>
                    <li class="nav-item <?= $controller === 'site' && $action === 'index' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="/"><?= Yii::t('app', 'Главная') ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= Yii::t('app', 'О нас') ?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <a class="dropdown-item" href="<?= Url::to(['about/index']) ?>"><?= Yii::t('app', 'Редакция') ?></a>
                            <a class="dropdown-item" href="<?= Url::to(['about/education-center']) ?>"><?= Yii::t('app', 'Учебный центр') ?></a>
                            <a class="dropdown-item" href="<?= Url::to(['about/printing']) ?>"><?= Yii::t('app', 'Полиграфия') ?></a>
                            <a class="dropdown-item" href="<?= Url::to(['about/photo-studio']) ?>"><?= Yii::t('app', 'Фотостудия') ?></a>
                        </ul>
                    </li>
                    <li class="nav-item <?= $controller === 'news' && $action === 'index' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="<?= Url::to(['news/index']) ?>"><?= Yii::t('app', 'Новости') ?></a>
                    </li>
                    <li class="nav-item <?= $controller === 'magazine' && $action === 'index' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="<?= Url::to(['magazine/index']) ?>"><?= Yii::t('app', 'Журналы') ?></a>
                    </li>
                    <li class="nav-item <?= $controller === 'article' && $action === 'index' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="<?= Url::to(['article/index']) ?>"><?= Yii::t('app', 'Материалы') ?></a>
                    </li>
                    <li class="nav-item <?= $controller === 'olympiad' && $action === 'index' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="<?= Url::to(['olympiad/index']) ?>"><?= Yii::t('app', 'Олимпиады') ?></a>
                    </li>
                    <li class="nav-item <?= $controller === 'project' && $action === 'index' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="<?= Url::to(['project/index', 'type' => Project::TYPE_PROJECT]) ?>"><?= Yii::t('app', 'Проекты') ?></a>
                    </li>
                    <li class="nav-item <?= $controller === 'site' && $action === 'contact' ? 'nav-item--active' : '' ?>">
                        <a class="nav-link" href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End: Navigation with Button -->