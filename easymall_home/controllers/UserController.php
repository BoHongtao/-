<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/24
 * Time: 10:17
 */
namespace app\controllers;
use app\models\User;
use common\models\LoginForm;
use Yii;
class UserController extends BaseController
{
    /*
     * 用户注册
     */
    public function actionRegister(){
        $this->layout = 'main_login';
        $user = new User();
        if(Yii::$app->request->isPost && $user->load(Yii::$app->request->post())){
            $user->userpwd = Yii::$app->getSecurity()->generatePasswordHash($user->userpwd);
            if ($user->save(false)){
                //暂时返回到首页
                $this->redirect(['home/index'])->send();
                return false;
            }
        }
        return $this->render('register',[
            'model'=>$user
        ]);
    }
    /*
     * 用户登录
     */
    public function actionLogin(){
        $this->layout = 'main_login';
        if(!Yii::$app->user->isGuest){
            return $this->redirect(['home/index']);
        }
        $model = new LoginForm();
        if( $model->load(Yii::$app->request->post()) && $model->login()){

        }
        return $this->render('login',[
            'model'=>$model
        ]);
    }
    /*
     * 验证
     */
    public function actionValidate(){
        $user = new User();
        if ($user->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($user);
        }
    }
}