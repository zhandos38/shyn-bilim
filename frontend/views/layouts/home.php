<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii2mod\alert\Alert;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" translate="no">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120813020-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120813020-4');
    </script>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="rbt-header-sticky">
<?php $this->beginBody() ?>

<!-- Start Header Area -->
<header class="rbt-header rbt-header-4">
    <div class="rbt-sticky-placeholder"></div>
    <!-- Start Header Top -->
    <div class="rbt-header-top rbt-header-top-1 variation-height-50 header-space-betwween bg-color-white border-top-bar-primary-color rbt-border-bottom d-none d-xl-block">
        <div class="container-fluid">
            <div class="rbt-header-sec align-items-center ">
                <div class="rbt-header-sec-col rbt-header-left">
                    <div class="rbt-header-content">
                        <div class="header-info">
                            <ul class="rbt-information-list">
                                <li>
                                    <a href="tel:87754037284"><i class="feather-phone"></i>+7(775) 403 72 84</a>
                                </li>
                                <li>
                                    <a href="tel:bilimshini.kz@mail.ru"><i class="feather-mail"></i>bilimshini.kz@mail.ru</a>
                                </li>
                            </ul>
                        </div>
                        <div class="rbt-separator"></div>
                        <div class="header-info">
                            <ul class="social-share-transparent">
                                <li>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="rbt-header-sec-col rbt-header-right">
                    <div class="rbt-header-content">
                        <div class="header-info">
                            <ul class="rbt-secondary-menu">
                                <li><a href="<?= Url::to(['site/questions']) ?>"><?= Yii::t('app', 'Сұрақ-жауап') ?></a></li>
                            </ul>
                        </div>
                        <div class="rbt-separator"></div>
                        <div class="header-info">
                            <div class="header-right-btn d-flex">
                                <a class="rbt-btn rbt-switch-btn btn-gradient btn-xs" href="#">
                                    <span data-text="Бізге қосылу">Бізге қосылу</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->

    <div class="rbt-header-wrapper header-space-betwween bg-color-white header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-start align-items-center">
                <div class="header-left">
                    <div class="logo">
                        <a style="display: flex; align-items: center" href="/">
                            <img src="/img/bilimshini-logo_reverse.png" alt="Bilimshini.kz">
                            <span class="ml--10 fw-bold" style="font-size: 28px; text-transform: uppercase; color: #2dc8bd">Bilim-shini.kz</span>
                        </a>
                    </div>
                </div>
                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="position-static">
                                <a href="/"><?= Yii::t('app', 'Главная') ?></a>
                            </li>
                            <li class="position-static">
                                <a href="<?= Url::to(['news/index']) ?>"><?= Yii::t('app', 'Блог') ?></a>
                            </li>
                            <li class="position-static">
                                <a href="<?= Url::to(['article/index']) ?>"><?= Yii::t('app', 'Балалар кітапханасы') ?></a>
                            </li>
                            <li class="position-static">
                                <a href="<?= Url::to(['article/index']) ?>"><?= Yii::t('app', 'Материалдар базасы') ?></a>
                            </li>
                            <li class="position-static">
                                <a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Сұрақ-жауап') ?></a>
                            </li>
                            <li class="position-static">
                                <a href="<?= Url::to(['site/contact']) ?>"><?= Yii::t('app', 'Контакты') ?></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <!-- Navbar Icons -->
                    <ul class="quick-access">
                        <li class="access-icon rbt-user-wrapper right-align-dropdown">
                            <a class="rbt-round-btn" href="#">
                                <i class="feather-user"></i>
                            </a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="/images/team/avatar.jpg" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">Nipa Bali</span>
                                            <a class="rbt-btn-link color-primary" href="profile.html">View Profile</a>
                                        </div>
                                    </div>
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="instructor-dashboard.html">
                                                <i class="feather-home"></i>
                                                <span>My Dashboard</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="index.html">
                                                <i class="feather-log-out"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="access-icon">
                            <a class="search-trigger-active rbt-round-btn" href="#">
                                <i class="feather-search"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                </div>
            </div>
        </div>
        <!-- Start Search Dropdown  -->
        <div class="rbt-search-dropdown">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="What are you looking for?">
                            <div class="submit-btn">
                                <a class="rbt-btn btn-gradient btn-md" href="#">Search</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="rbt-separator-mid">
                    <hr class="rbt-separator m-0">
                </div>

                <div class="row g-4 pt--30 pb--60">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5 class="rbt-title-style-2">Our Top Course</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Search Dropdown  -->
    </div>
</header>

<?php include_once "_mobile-menu.php" ?>

<?= Alert::widget() ?>
<?= $content ?>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
