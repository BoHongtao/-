<?php
namespace app\assets;
use yii\web\AssetBundle;
class AppAssetLogin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/bootstrap/bootstrap.css',
        'static/css/bootstrap/bootstrap-responsive.css',
        'static/css/bootstrap/bootstrap-overrides.css',
        'static/css/layout.css',
        'static/css/elements.css',
        'static/css/icons.css',
        'static/css/lib/font-awesome.css',
        'static/css/compiled/signin.css'
    ];
    public $js = [
        'static/js/bootstrap.min.js',
        'static/js/theme.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
