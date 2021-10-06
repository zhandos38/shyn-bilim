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
        'css/font-icons.min.css',
        'css/theme-vendors.min.css',
        'css/style.css',
        'css/responsive.css',
        'revolution/css/settings.css',
        'revolution/css/layers.css',
        'revolution/css/navigation.css',
        'css/custom.css',
    ];
    public $js = [
        'js/theme-vendors.min.js',
        'revolution/js/jquery.themepunch.tools.min.js',
        'revolution/js/jquery.themepunch.revolution.min.js',
        'js/main.js',
        'revolution/js/extensions/revolution.extension.slideanims.min.js',
		'revolution/js/extensions/revolution.extension.layeranimation.min.js',
		'revolution/js/extensions/revolution.extension.navigation.min.js',
        'js/home.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}