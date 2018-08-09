<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:22
 */
namespace app\controllers;
use Yii;
use app\models\GoodsType;

class GoodTypeController extends BaseController
{
    /*
     * 类型
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*
     * 类型列表
     */
    public function actionData($typename = '')
    {
        $typeInfo = GoodsType::find()->joinWith('typePic')->filterWhere(['type' => $typename])->asArray()->all();
        return $this->renderPartial('_list', [
            'typeInfo' => $typeInfo
        ]);
    }

    /*
     * 类型的添加
     */
    public function actionAdd()
    {
        $type = new GoodsType();
        if($this->isPost()){

        }
        return $this->render('add', [
            'type' => $type
        ]);
    }

    /*
     * 表单验证
     */
    public function actionValidateAdd()
    {
        $type = new GoodsType();
        if ($type->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($type);
        }
    }
}