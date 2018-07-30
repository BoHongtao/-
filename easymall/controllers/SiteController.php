<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/30
 * Time: 16:26
 */
namespace app\controllers;

use Yii;
use app\models\LoginVerity;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                    ],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => 39,
                'width' => 130,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'maxLength' => 5,
                'minLength' => 5,
                'padding' => -5,
                'fontFile'=>'static/fonts/captcha.ttf'
            ],
        ];
    }

    //登录
    public function actionLogin(){
        $this->layout = 'main_login';
        //是否登录
        if(!Yii::$app->user->isGuest){
            echo "登录成功";
            exit();
        }
        //没登录
        $model = new LoginVerity();
        return $this->render('login',[
            'model'=>$model
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(\yii\helpers\Url::to(['site/login']));
    }

}