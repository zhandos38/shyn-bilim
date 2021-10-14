<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\HomeAsset;
use yii2mod\alert\Alert;
use yii\helpers\Url;

HomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <!-- start navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll">
        <div class="container-fluid nav-header-container">
            <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                <a class="navbar-brand" href="/">
                    <img src="/img/logo_alt.png" data-at2x="/img/logo_alt.png" class="default-logo" alt="">
                    <img src="/img/logo_alt_black.png" data-at2x="/img/logo_alt_black.png" class="alt-logo" alt="">
                    <img src="/img/logo_alt_black.png" data-at2x="/img/logo_alt_black.png" class="mobile-logo" alt="">
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
                <div class="header-language dropdown d-lg-inline-block text-white">
                    <?= $this->render('_account') ?>
                </div>
                <div class="header-language dropdown d-lg-inline-block">
                    <?= $this->render('_language') ?>
                </div>
            </div>
        </div>
    </nav>
</header>

<?= Alert::widget() ?>
<?= $content ?>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
