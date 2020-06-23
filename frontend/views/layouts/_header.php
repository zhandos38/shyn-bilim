<?php
use yii\helpers\Url;

?>
<!-- Start: Navigation Upper with Button -->
<div class="top-header">
    <div class="container">
        <div class="top-header__content">
            <div class="top-header__contact">
                <div class="navbar-phone">
                    <i class="fa fa-phone"></i> +7 (701) 312-99-06
                </div>
                <div class="navbar-email">
                    <i class="fa fa-envelope"></i> bilimshini.kz@mail.ru
                </div>
            </div>
            <div class="navbar-button">
                <?= $this->render('select-language') ?>
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
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item navbar-mobile-button">
                        <div class="navbar-mobile-language">
                            <?= $this->render('select-language') ?>
                        </div>
                    </li>
                    <li class="nav-item nav-item--active">
                        <a class="nav-link" href="/"><?= Yii::t('app', 'Главная') ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= Yii::t('app', 'О нас') ?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <a class="dropdown-item" href="<?= Url::to(['about/index']) ?>"><?= Yii::t('app', 'Редакция') ?></a>
                            <a class="dropdown-item" href="<?= Url::to(['about/education-center']) ?>"><?= Yii::t('app', 'Учебный центр') ?></a>
                            <a class="dropdown-item" href="<?= Url::to(['about/printing']) ?>"><?= Yii::t('app', 'Печатное дело') ?></a>
                            <a class="dropdown-item" href="<?= Url::to(['about/photo-studio']) ?>"><?= Yii::t('app', 'Фотостудия') ?></a>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['magazine/index']) ?>"><?= Yii::t('app', 'Новости') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['magazine/index']) ?>"><?= Yii::t('app', 'Журналы') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['article/index']) ?>"><?= Yii::t('app', 'Материалы') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['olympiad/index']) ?>"><?= Yii::t('app', 'Олимпиады') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::to(['project/index']) ?>"><?= Yii::t('app', 'Проекты') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End: Navigation with Button -->