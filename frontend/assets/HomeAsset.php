<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/reset.css',
        'fonts/font-awesome.min.css',
        'css/navbar.css',
        'css/style.css',
        'css/aos.css',
    ];
    public $js = [
        'js/tween.js',
        'js/wavify.js',
        'js/jquery.wavify.js',
        'js/aos.js',
        'js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}