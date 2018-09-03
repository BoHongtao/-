<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/3
 * Time: 20:47
 */
namespace app\controllers;
use app\models\Supplier;

class SupplierController extends BaseController
{
    /*
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * 供应商列表
     */
    public function actionData()
    {
        $query = Supplier::find();
        $pager = $this->Pager($query,'supplier/data');
        $supplierInfo = $query->offset($pager->offset)->limit($pager->limit)->asArray()->all();
        return $this->renderPartial('_list',[
            'supplierInfo'=>$supplierInfo,
            'pager'=>$pager
        ]);
    }
}