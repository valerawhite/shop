<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/bootstrap.min.css',
		'css/font-awesome.min.css',
		'css/nouislider.min.css',
		'css/slick.css',
		'css/slick-theme.css',
		'css/style.css',
		'fonts/FontAwesome.otf',
		'fonts/fontawesome-webfont.svg',
		'fonts/fontawesome-webfont',
		'fonts/slick.svg',
		'fonts/slick.eot',
		'fonts/slick.ttf',
		'fonts/fontawesome-webfont.eot',
		'fonts/fontawesome-webfont.woff',
		'fonts/fontawesome-webfont.woff2',
		'fonts/slick.woff',
		];
    public $js = [
	'js/jquery.min.js',
	'js/bootstrap.min.js',
	'js/slick.min.js',
	'js/nouislider.min.js',
	'js/jquery.zoom.min.js',
	'js/main.js',
	
    ];
   
}
