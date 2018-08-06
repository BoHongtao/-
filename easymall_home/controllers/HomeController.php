<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/6
 * Time: 10:53
 */

namespace app\controllers;

class HomeController extends BaseController{
    /*
     * 前台首页
     */
    public function actionIndex(){
        return $this->render('index');
    }
}