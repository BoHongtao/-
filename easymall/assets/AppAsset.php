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
        'static/css/font-awesome.min.css',
        'static/css/bootstrap.min.css',
        'static/css/ace.min.css',
        'static/css/detail.css',
        'static/css/ace-rtl.min.css',
        'static/css/ace-skins.min.css',
//        'static/css/jquery-ui-1.10.3.full.min.css',
        'static/css/toastr.css',
//        'static/star-rating/css/star-rating.css',
//        'static/timepicker/css/bootstrap-timepicker.min.css',
        'static/jquery-ui/jquery-ui.min.css',
    ];
    public $js = [
        'static/js/ace-extra.min.js',
//        'static/js/jquery-2.2.3.min.js',
        'static/js/jquery-form.js',
//        'static/js/jquery.mobile.custom.min.js',
//        'static/js/bootstrap.min.js',
        'static/js/typeahead-bs2.min.js',
//        'static/js/jquery-ui-1.10.3.custom.min.js',
        'static/js/jquery.ui.touch-punch.min.js',
        'static/js/jquery.slimscroll.min.js',
        'static/js/jquery.easy-pie-chart.min.js',
        'static/js/jquery.sparkline.min.js',
        'static/js/flot/jquery.flot.min.js',
        'static/js/flot/jquery.flot.pie.min.js',
        'static/js/flot/jquery.flot.resize.min.js',
        'static/js/ace-elements.min.js',
        'static/js/ace.min.js',
        'static/js/wang.js',
        'static/js/dialog.js',
        'static/js/toastr.js',
        'static/js/sources.js',
//        'static/star-rating/js/star-rating.js',
        'static/js/doT.min.js',
//        'static/timepicker/js/bootstrap-timepicker.min.js',
//        'static/jquery-ui/jquery-migrate-3.0.0.js',
        'static/jquery-ui/jquery-ui.min.js',
        'static/js/My97DatePicker/WdatePicker.js',
//        'static/js/distribution/fastclick.js',
//        'static/js/distribution/jquery.min.js',
//        'static/js/distribution/jqery-2.1.4.js',
//        'static/js/distribution/jquery-weui.min.js,
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
