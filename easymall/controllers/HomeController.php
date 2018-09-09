<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/31
 * Time: 9:52
 * 后台首页
 */
namespace app\controllers;

use app\models\Operators;
use Yii;

class HomeController extends BaseController
{
    public function actionIndex()
    {
        //登陆用户信息
        $user_id = Yii::$app->user->id;
        $userInfo = Operators::find()->where(['id'=>$user_id])->one();
        return $this->render('index', [
            'user'=>$userInfo
        ]);
    }
}
