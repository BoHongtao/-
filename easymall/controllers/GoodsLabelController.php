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
     * 添加标签
     */
    public function actionAdd()
    {
        $model = new GoodsLabel();
        if(Yii::$app->request->isPost){
            $this->returnJson();
            $data = Yii::$app->request->post();
            if($model->load($data) && $model->save()){
                return ['code'=>200];
            }else{
                return ['code'=>0,'msg'=>$this->getMsg($model)];
            }
        }
        return $this->render('add',[
            'model'=>$model
        ]);
    }

}