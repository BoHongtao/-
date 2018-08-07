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
        //bootstrap
        'static/css/bootstrap/bootstrap.css',
        'static/css/bootstrap/bootstrap-responsive.css',
        'static/css/bootstrap/bootstrap-overrides.css',

        //global
        'static/css/layout.css',
        'static/css/elements.css',
        'static/css/icons.css',

        'static/css/lib/font-awesome.css',

    ];
    public $js = [
//        'static/js/jquery-latest.js',
        'static/js/base.js',
        'static/layer/layui.js',
        'static/js/jquery-form.js',
        'static/js/jquery-ui-1.10.2.custom.min.js',
        'static/js/jquery.knob.js',
        'static/js/jquery.flot.js',
        'static/js/jquery.flot.resize.js',
        'static/js/theme.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
