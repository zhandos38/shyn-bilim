<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-icons.min.css',
        'css/theme-vendors.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/custom.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/theme-vendors.min.js',
        'js/main.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}