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
use app\models\Supplier;
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
        //获取商品的类型
        $typeInfo = GoodsType::find()->select('id,type')->asArray()->all();
        //获取商品的供应商
        $supplierInfo = Supplier::find()->select('id,supplier_name')->asArray()->all();
        $goods = new Goods();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();

        }
        return $this->render('add', [
            'typeInfo'=>$typeInfo,
            'supplierInfo'=>$supplierInfo,
            'goods'=>$goods
        ]);
    }
}
