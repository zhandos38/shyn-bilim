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
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>

<div class="hero">
    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink'      =>  [
                'label'     =>  Yii::t('yii', 'Home'),
                'url'       =>  ['/site/index'],
                'class'     =>  'home',
                'template'  =>  '<i class="fa fa-home"></i>{link}'.PHP_EOL,
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'itemTemplate' => '<i class="fa fa-angle-right"></i>{link}'.PHP_EOL,
            'tag' =>  'ul',
        ]); ?>
    </div>
</div>

<div class="site-container container" style="padding: 0">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<?= $this->render('_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
