<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/30
 * Time: 10:39
 */
namespace app\controllers;

use app\models\GoodsLabel;
use Yii;
class GoodsLabelController extends BaseController{
    /*
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * 展示list
     */
    public function actionData()
    {
        $labelInfo = GoodsLabel::find()->asArray()->all();
        return $this->renderPartial('_list',[
            'labelInfo'=>$labelInfo
        ]);
    }
    /*
     * 添加和编辑标签
     */
    public function actionChange($id = '')
    {
        $id and $model = GoodsLabel::findOne(['id'=>$id]) or $model = new GoodsLabel();
        if(Yii::$app->request->isPost){
            $this->returnJson();
            $data = Yii::$app->request->post();
            if(!$model->load($data))
                return ['code'=>0,'msg'=>$this->getMsg($model)];
            $id and $model->id = $id;
            if(!$model->save())
                return ['code'=>0,'msg'=>$this->getMsg($model)];
            return ['code'=>200];
        }
        return $this->render('change',[
            'model'=>$model,
            'id' => $id
        ]);
    }
    /*
     * 删除标签
     */
    public function actionDel()
    {
        $id = Yii::$app->request->post('id');
        $this->returnJson();
        if($id=='')
            return ['code'=>0,'msg'=>"非法参数"];
        $goodslabel = GoodsLabel::findOne(['id'=>$id]);
        $this->returnJson();
        if(GoodsLabel::deleteAll(['id'=>$id]))
            return ['code'=>200];
        return ['code'=>0,'msg'=>$this->getMsg($goodslabel)];
    }

    public function actionValidate($id='')
    {
        $id and $type = GoodsLabel::findOne(['id'=>$id]) or $type = new GoodsLabel();
        if ($type->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($type);
        }
    }

}