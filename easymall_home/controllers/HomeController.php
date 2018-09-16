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
use Yii;

class HomeController extends BaseController
{
    /*
     * 前台首页
     */
    public function actionIndex()
    {
        //开启缓存
        $cache = Yii::$app->cache;
        //轮播图查询
        if (!$cache->exists('sowing_map')) {
            $sowing_map = SowingMap::find()->select("pic")->asArray()->all();
            $cache->add('sowing_map', $sowing_map, 1800);
        } else {
            $sowing_map = $cache->get('sowing_map');
        }
        //查询类别
        $goods_type = GoodsType::find()->select(['filename','goods_type.*'])->leftJoin('pictures', 'goods_type.pic_id=pictures.id')->orderBy('order')->asArray()->all();
        return $this->render('index', [
            'sowing_map'=>$sowing_map,
            'good_type'=>$goods_type
        ]);
    }
}
