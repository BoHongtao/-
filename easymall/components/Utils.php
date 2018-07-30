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
    /*
    * 证件类型
     */

     public static function port_type($type){
         return empty(Yii::$app->params['cert_type'][$type])?'未知':Yii::$app->params['cert_type'][$type];
    }

    public static function sex($sex){
         return empty(Yii::$app->params['sex'][$sex])?'未知':Yii::$app->params['sex'][$sex];
    }

    public static function checkAccess($authname = ""){
        if(Yii::$app->user->id === 1)
            return true;

        $auth = Yii::$app->authManager;
        $authitem = $auth->getPermission($authname);
        if(empty($authitem))
            return true;

        return $auth->checkAccess(Yii::$app->user->id,$authname);
    }

    /**
     * 计算时间差
     * @param int $timestamp1 时间戳开始
     * @param int $timestamp2 时间戳结束
     * @return array
     */
    public static function time_diff($timestamp1, $timestamp2)
    {
        if ($timestamp2 < $timestamp1)
        {
            $timestamp2 += 3600*24;
        }
        $timediff = $timestamp2 - $timestamp1;

        // 时
        $hours = intval($timediff/3600);

        // 分
        $remain = $timediff%3600;
        $mins = intval($remain/60);
        // 秒
        $secs = $remain%60;

        $time = ['hours'=>str_pad($hours,2,0,STR_PAD_LEFT), 'minutes'=>str_pad($mins,2,0,STR_PAD_LEFT), 'seconds'=>str_pad($secs,2,0,STR_PAD_LEFT)];
        return $time;
    }

    public static function list_sort_by($list,$field, $sortby='asc') {
        if(is_array($list)){
            $refer = $resultSet = array();
            foreach ($list as $i => $data)
                $refer[$i] = &$data[$field];
            switch ($sortby) {
                case 'asc': // 正向排序
                    asort($refer);
                    break;
                case 'desc':// 逆向排序
                    arsort($refer);
                    break;
                case 'nat': // 自然排序
                    natcasesort($refer);
                    break;
            }
            foreach ( $refer as $key=> $val)
                $resultSet[] = &$list[$key];
            return $resultSet;
        }
        return $list;
    }
}