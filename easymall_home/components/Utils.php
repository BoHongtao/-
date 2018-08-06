<?php
/**
 * Created by PhpStorm.
 * User: 谷晨
 * Date: 2017/7/11
 * Time: 16:17
 */
namespace app\components;

use Yii;
class Utils {
    public static function checkAccess($authname = ""){
        if(Yii::$app->user->id === 1)
            return true;

        $auth = Yii::$app->authManager;
        $authitem = $auth->getPermission($authname);
        if(empty($authitem))
            return true;

        return $auth->checkAccess(Yii::$app->user->id,$authname);
    }


}