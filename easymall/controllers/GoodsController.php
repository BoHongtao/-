<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/10
 * Time: 20:51
 */
namespace app\controllers;

use app\models\Goods;
use app\models\GoodsType;
use Yii;

class GoodsController extends BaseController
{
    /*
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * 列表
     */
    public function actionData($good_name = '', $type = '')
    {
        $query = Goods::find()->filterWhere(['good_name'=>$good_name])->filterWhere(['good_type'=>$type]);
        $goodType = GoodsType::find()->select('id,type')->asArray()->all();
        $pager = $this->Pager($query, 'goods-label/data');
        $goodsInfo = $query->offset($pager->offset)->limit($pager->limit)->asArray()->all();
        return $this->renderPartial('_list', [
            'goodsInfo'=>$goodsInfo,
            'goodType'=>$goodType,
            'pager'=>$pager
        ]);
    }
    /*
     * 发布商品
     */
    public function actionAddGood()
    {
        die;
    }
}
