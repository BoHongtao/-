<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/24
 * Time: 10:17
 */
namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use app\models\UserDetail;
use Yii;

class UserController extends BaseController
{
    /*
     * 用户注册
     */
    public function actionRegister()
    {
        $this->layout = 'main_login';
        $user = new User();
        $user->scenario = "register";
        if (Yii::$app->request->isPost && $user->load(Yii::$app->request->post())) {
            $user->userpwd = Yii::$app->getSecurity()->generatePasswordHash($user->userpwd);
            if ($user->save(false)) {
                //暂时返回到首页
                //计划是完善用户信息，然后跳转首页
                $this->redirect(['home/index'])->send();
                return false;
            }
        }
        return $this->render('register', [
            'model'=>$user
        ]);
    }
    /*
     * 用户登录
     */
    public function actionLogin()
    {
        $this->layout = 'main_login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['home/index']);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $users = Yii::$app->user->identity;

            return $this->redirect(['home/index']);
        }
        return $this->render('login', [
            'model'=>$model
        ]);
    }
    /*
     * 用户注销
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(\yii\helpers\Url::to(['home/index']));
    }


    /*
     * 验证
     */
    public function actionValidate()
    {
        $user = new User();
        if ($user->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($user);
        }
    }
}
