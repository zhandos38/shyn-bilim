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
<body>
<?php $this->beginBody() ?>

<header>
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg top-space navbar-light bg-white header-light navbar-boxed fixed-top header-reverse-scroll">
        <div class="container-fluid nav-header-container">
            <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo_alt_black.png" data-at2x="/img/logo_alt_black.png" class="default-logo" alt="">
                    <img src="/img/logo_alt_black.png" data-at2x="/img/logo_alt.png" class="alt-logo" alt="">
                    <img src="/img/logo_alt_black.png" data-at2x="/img/logo_alt.png" class="mobile-logo" alt="">
                </a>
            </div>
            <div class="col-auto col-lg-8 menu-order px-lg-0">
                <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                    <span class="navbar-toggler-line"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <?= $this->render('_nav') ?>
                </div>
            </div>
            <div class="col-auto col-lg-2 text-end pe-0 font-size-0">
                <div class="header-language dropdown d-lg-inline-block">
                    <?= $this->render('_account') ?>
                </div>
                <div class="header-language dropdown d-lg-inline-block">
                    <?= $this->render('_language') ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<section class="bg-light-gray padding-40px-tb sm-padding-30px-tb page-title-small">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-6 text-center text-lg-start">
                <?php if (!empty($this->params['heroTitle'])): ?>
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom d-inline-block"><?= $this->params['heroTitle'] ?></h1>
                <?php endif; ?>
                <?php if (!empty($this->params['heroDescription'])): ?>
                <span class="alt-font text-medium d-block d-md-inline-block sm-margin-5px-top"><?= $this->params['heroDescription'] ?></span>
                <?php endif; ?>
            </div>
            <div class="col-xl-4 col-lg-6 text-center text-lg-end breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-15px-top">
                <?= Breadcrumbs::widget([
                    'homeLink'      =>  [
                        'label'     =>  Yii::t('yii', 'Home'),
                        'url'       =>  ['/site/index'],
                        'class'     =>  'home',
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'tag' =>  'ul',
                ]); ?>
            </div>
        </div>
    </div>
</section>

<div class="site-container">
    <div class="container pt-5 pb-5">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
