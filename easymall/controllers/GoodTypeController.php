<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:22
 */
namespace app\controllers;
use app\models\Pictures;
use Yii;
use app\models\GoodsType;
use yii\db\Exception;
use yii\web\UploadedFile;


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
        $typeInfo = GoodsType::find()->filterWhere(['type' => $typename])->asArray()->all();
        $typeInfo = GoodsType::getPic($typeInfo);
//        var_dump($typeInfo);die;
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
            $this->returnJson();
            $pic1 = new Pictures();
            $pic2 = new Pictures();
            $data = Yii::$app->request->post();
            $tr = Yii::$app->db->beginTransaction();
            try{
                if(!$type->load($data))
                    throw new \Exception($this->getMsg($type));

                $type->file = UploadedFile::getInstance($type,'file');
                $type->file and $pic1->filename = $type->upload();
                //保存主图片
                if(!$pic1->save(false))
                    throw new Exception($this->getMsg($pic1));
                $type->pic_id = $pic1->id;

                //保存小logo
                $type->file = UploadedFile::getInstance($type,'logo');
                $type->file and $pic2->filename = $type->upload();
                if(!$pic2->save(false)){
                    throw new Exception($this->getMsg($pic2));
                }
                $type->logo_id = $pic2->id;
                if(!$type->save(false))
                    throw new Exception($this->getMsg($type));
                $tr->commit();
                return ['code'=>200];
            }catch (\Exception $exception){
                $tr->rollBack();
                return ['code'=>0,'msg'=>$exception->getMessage()];
            }
        }
        return $this->render('add', [
            'type' => $type
        ]);
    }

    /*
     * 表单验证
     */
    public function actionValidate()
    {
        $type = new GoodsType();
        if ($type->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($type);
        }
    }
}