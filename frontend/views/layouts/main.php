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
                                    <a href="https://www.facebook.com/profile.php?id=100009917714377&_se_imp=013RoUTUXRDM4XUc6&paipv=0&eav=Afb7V5VR0QCk9ms7t2tkGwlt1LX56AM_a85ywYirohUiYpqyPlWlar0yU3n7F2dP45g&_rdr">
                                        <i class="feather-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/shyn.baspahana/?hl=ru">
                                        <i class="feather-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="rbt-header-sec-col rbt-header-right">
                    <div class="rbt-header-content">
                        <div class="header-info">
                            <?= $this->render('_language') ?>
                        </div>
                        <div class="header-info">
                            <a style="font-size: 14px" href="<?= Url::to(['site/questions']) ?>"><?= Yii::t('app', 'Сұрақ-жауап') ?></a>
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
                            <span class="ml--10 fw-bold logo-title">Bilim-shini.kz</span>
                        </a>
                    </div>
                </div>
                <div class="rbt-main-navigation d-none d-xl-block">
                    <?= $this->render('_nav') ?>
                </div>
                <div class="rbt-main-navigation">
                    <?= $this->render('_mobile-menu') ?>
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

<?= $this->render('_mobile-menu') ?>

<?= Alert::widget() ?>

<?= $content ?>

<div class="rbt-progress-parent">
    <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
