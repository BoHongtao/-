<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/31
 * Time: 9:52
 * 后台首页
 */
namespace app\controllers;

class HomeController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
