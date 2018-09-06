<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/6
 * Time: 13:30
 * 轮播图管理
 */
namespace app\controllers;

use app\models\SowingMap;
use Yii;
use yii\db\Exception;
use yii\web\UploadedFile;

class SowingMapController extends BaseController
{
    /*
     * 首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * 轮播图的展示和列表
     */
    public function actionData()
    {
        $query = SowingMap::find();
        $pager = $this->Pager($query, 'sowing-map/data');
        $info = $query->limit($pager->limit)->offset($pager->offset)->asArray()->all();
        return $this->renderPartial('_list', [
            'info'=>$info,
            'pager'=>$pager
        ]);
    }
    /*
     * 上传轮播图的iframe
     */
    public function actionUpload()
    {
        $this->layout = false;
        if (Yii::$app->request->isPost) {
            $this->returnJson();
            $sowing_map = new SowingMap();
            $sowing_map->file = UploadedFile::getInstanceByName('file');
            $sowing_map->file and $sowing_map->pic = $sowing_map->upload();
            if ($sowing_map->save()) {
                return ['code'=>0,'msg'=>'','data'=>['src'=>picPath($sowing_map->pic)]];
            }
            return ['code'=>500,'msg'=>$this->getMsg($sowing_map),'data'=>['src'=>'']];
        }
        return $this->render('upload');
    }
    /*
     * 删除某张轮播图
     */
    public function actionDel()
    {
        if (Yii::$app->request->isPost) {
            $this->returnJson();
            $id = Yii::$app->request->post('id', '');
            $sowing_map = SowingMap::find()->filterWhere(['id'=>$id])->one();
            //删除旧的图片
            $tr = Yii::$app->db->beginTransaction();
            try {
                if (!deleteFile(picPath($sowing_map->pic))) {
                    throw new \Exception("删除文件失败");
                }
                if (!SowingMap::deleteAll(['id'=>$id])) {
                    throw new Exception($this->getMsg($sowing_map));
                }
                $tr->commit();
                return ['code'=>200];
            } catch (\Exception $e) {
                $tr->rollBack();
                $msg = $e->getMessage();
                return ['code'=>0,'msg'=>$msg];
            }
        }
    }
}
