<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/6
 * Time: 10:53
 */
namespace app\controllers;

use app\models\GoodsType;
use app\models\SowingMap;

class HomeController extends BaseController{
    /*
     * 前台首页
     */
    public function actionIndex(){
        //录播图查询
        $sowing_map = SowingMap::find()->select("pic")->asArray()->all();
        $goods_type = GoodsType::find()->select(['filename','goods_type.*'])->leftJoin('pictures','goods_type.pic_id=pictures.id')->orderBy('order')->asArray()->all();
        //查询类别
        return $this->render('index',[
            'sowing_map'=>$sowing_map,
            'good_type'=>$goods_type
        ]);
    }
}