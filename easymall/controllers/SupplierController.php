<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/3
 * Time: 20:47
 */
namespace app\controllers;

use app\models\Supplier;
use Yii;

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
        $pager = $this->Pager($query, 'supplier/data');
        $supplierInfo = $query->offset($pager->offset)->limit($pager->limit)->asArray()->all();
        return $this->renderPartial('_list', [
            'supplierInfo'=>$supplierInfo,
            'pager'=>$pager
        ]);
    }
    /*
     * 添加 && 编辑供货商
     */
    public function actionChange($supplier_id='')
    {
        $supplier_id and $model = Supplier::findOne(['id'=>$supplier_id]) or $model = new Supplier();
        if (Yii::$app->request->isPost) {
            $this->returnJson();
            $data = Yii::$app->request->post();
            if (!$model->load($data)) {
                return ['code'=>0,'msg'=>$this->getMsg($model)];
            }
            $supplier_id and $model->id = $supplier_id;
            if (!$model->save()) {
                return ['code'=>0,'msg'=>$this->getMsg($model)];
            }
            return ['code'=>200];
        }
        return $this->render('change', [
            'model'=>$model,
            'supplier_id'=>$supplier_id
        ]);
    }
    /*
     * 删除供货商
     */
    public function actionDel()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('supplier_id');
            $this->returnJson();
            if ($id=='') {
                return ['code'=>0,'msg'=>"非法参数"];
            }
            $supplier = Supplier::findOne(['id'=>$id]);
            if (Supplier::deleteAll(['id'=>$id])) {
                return ['code'=>200];
            }
            return ['code'=>0,'msg'=>$this->getMsg($supplier)];
        }
    }
    /*
     * Ajax验证
     */
    public function actionValidate($supplier_id = '')
    {
        $supplier_id and $supplier = Supplier::findOne(['id'=>$supplier_id]) or $supplier = new Supplier();
        if ($supplier->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($supplier);
        }
    }
}
