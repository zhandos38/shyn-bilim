<?php

namespace frontend\assets;

use yii\bootstrap5\BootstrapAsset;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/vendor/bootstrap.min.css',
        'css/vendor/slick.css',
        'css/vendor/slick-theme.css',
        'css/plugins/sal.css',
        'css/plugins/feather.css',
        'css/plugins/fontawesome.min.css',
        'css/plugins/euclid-circulara.css',
        'css/plugins/swiper.css',
        'css/plugins/magnify.css',
        'css/plugins/odometer.css',
        'css/plugins/animation.css',
//        'css/plugins/bootstrap-select.min.css',
        'css/plugins/jquery-ui.css',
        'css/plugins/magnigy-popup.min.css',
        'css/plugins/plyr.css',
        'css/style.css',

        'css/custom.css',
    ];
    public $js = [
        'js/vendor/modernizr.min.js',
        'js/vendor/jquery.js',
        'js/vendor/bootstrap.min.js',
        'js/vendor/sal.js',
        'js/vendor/swiper.js',
        'js/vendor/magnify.min.js',
        'js/vendor/jquery-appear.js',
        'js/vendor/odometer.js',
        'js/vendor/backtotop.js',
        'js/vendor/isotop.js',
        'js/vendor/imageloaded.js',
        'js/vendor/wow.js',
        'js/vendor/waypoint.min.js',
        'js/vendor/easypie.js',
        'js/vendor/text-type.js',
        'js/vendor/jquery-one-page-nav.js',
//        'js/vendor/bootstrap-select.min.js',
        'js/vendor/jquery-ui.js',
        'js/vendor/magnify-popup.min.js',
        'js/vendor/paralax-scroll.js',
        'js/vendor/paralax.min.js',
        'js/vendor/countdown.js',
        'js/vendor/plyr.js',

        'js/main.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}