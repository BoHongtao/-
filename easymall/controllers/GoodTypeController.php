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
            $this->returnJson();
            $pic = new Pictures();
            $data = Yii::$app->request->post();
            $tr = Yii::$app->db->beginTransaction();
            try{
                if(!$type->load($data))
                    throw new \Exception($this->getMsg($type));
                $type->file = UploadedFile::getInstance($type,'file');
                $type->file and $pic->filename = $type->upload();
                //保存图片
                if(!$pic->save(false))
                    throw new Exception($this->getMsg($pic));
                $type->pic_id = $pic->id;
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