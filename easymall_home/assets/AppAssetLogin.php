<?php
namespace app\assets;
use yii\web\AssetBundle;
class AppAssetLogin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/reset.css',
        'static/css/main.css',
        "static/css/reset.css"
    ];
    public $js = [
        'static/js/jquery-1.12.4.min.js',
        'static/js/register.js',
        'static/js/jquery-form.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
