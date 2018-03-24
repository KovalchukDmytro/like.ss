<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'libraries/owl-carousel-2.2.1/owl.carousel.min.css',
        'libraries/owl-carousel-2.2.1/owl.theme.default.min.css',
        'libraries/bootstrap-touch-slider/bootstrap-touch-slider.min.css',
        'libraries/wow-animation/animate.css',
	    'libraries/magnific-popup.css',
	    'css/style.css',
    ];
    public $js = [
		'libraries/jquery-3.3.1.min.js',
        'libraries/jquery.magnific-popup.js',
        'libraries/bootstrap-3.3.7/js/bootstrap.min.js',
        'libraries/bootstrap-touch-slider/bootstrap-touch-slider-min.js',
        'libraries/owl-carousel-2.2.1/owl.carousel.min.js',
        'libraries/wow-animation/wow.min.js',
	    'js/script.min.js'
    ];
    public $depends = [
    ];
}
