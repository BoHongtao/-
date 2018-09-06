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

class SiteController extends Controller
{
    public function behaviors()
    {
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'height' => 42,
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
    public function actionLogin()
    {
        $this->layout = 'main_login';
        //是否登录
        if (!Yii::$app->user->isGuest) {
            $this->actionMenu();
        }
        //没登录
        $model = new LoginVerity();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user = Yii::$app->user->identity;
            //保存登录信息
            $user->record_time = date('Y-m-d H:i:s');
            $user->last_login_ip = ip2long(Yii::$app->request->userIP);
            $user->save();
            return $this->redirect(['home/index']);
        }
        return $this->render('login', [
            'model'=>$model
        ]);
    }
    //登录成功后的跳转页面
    public function actionMenu()
    {
        $menus = login();
        foreach ($menus as $value) {
            if (!isset($value['_child'])) {
                return $this->redirect([$value['route']]);
            }
            foreach ($value['_child'] as $val) {
                if ($val['display'] == 2) {
                    return $this->redirect([$val['route']]);
                }
            }
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(\yii\helpers\Url::to(['site/login']));
    }
}
