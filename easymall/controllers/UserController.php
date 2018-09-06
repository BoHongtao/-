<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/5
 * Time: 20:37
 */
namespace app\controllers;

use app\models\User;
use Yii;

class UserController extends BaseController
{
    /*
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
     * 用户列表
     */
    public function actionData()
    {
        $query = User::find();
        $pager = $this->Pager($query, 'user/data');
        $userInfo = $query->offset($pager->offset)->limit($pager->limit)->asArray()->all();
        return $this->renderPartial('_list', [
            'userInfo'=>$userInfo,
            'pager'=>$pager
        ]);
    }
}
