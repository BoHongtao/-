<?php

namespace app\controllers;

use app\models\AuthAssignment;
use app\models\OperatorsInfo;
use Yii;
use app\models\Operators;
use app\models\Pwd;
use yii\db\Exception;
use yii\web\UploadedFile;

class OperatorsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * 管理员列表
     * @param  $operator_name  要查找管理员的名字，为空查找所有
     */
    public function actionData($operator_name = '')
    {
        //获取管理员及关联管理员的信息
        $query = Operators::find()->joinWith('operatorinfos')->filterWhere(['operator_name'=>$operator_name]);
        $pager = $this->Pager($query,'operators/data');
        $OperatorsInfos = $query->offset($pager->offset)->limit($pager->limit)->asArray()->all();
        //角色id与角色名字映射关系
        $role = Yii::$app->authManager->getRoles();
        $role = array_column($role, "description", "type");
        return $this->renderPartial('_list',[
            'OperatorsInfos'=>$OperatorsInfos,
            'pager'=>$pager,
            'role'=>$role
        ]);
    }

    /*
     * 添加一个管理员
     */
    public function actionAdd()
    {
        $operator = new Operators();
        $operator_info = new OperatorsInfo();
        if(Yii::$app->request->isAjax && $operator->load(Yii::$app->request->post())){
            $this->returnJson();
            //开始事务
            $tr = Yii::$app->db->beginTransaction();
            try{
                //登陆密码哈希处理
                $operator->password =  Yii::$app->getSecurity()->generatePasswordHash($operator->password);
                $operator->file = UploadedFile::getInstance($operator,'file');
                $operator->operator_type = 1;
                $operator->file and $operator_info->head_pic = $operator->upload();
                if(!$operator->save(false))
                    throw new Exception($this->getMsg($operator));
                //管理员详细信息入库
                $new_operator_id = $operator->id;
                $operator_info->operator_id = $new_operator_id;
                $operator_info->company = $operator->company;
                $operator_info->truename = $operator->true_name;
                $operator_info->wechat = $operator->wechat;
                $operator_info->email = $operator->email;
                $operator_info->contact_phone = $operator->contact_phone;
                if (!$operator_info->save())
                    throw new \Exception($this->getMsg($operator_info));
                $tr->commit();
                return ['code'=>200];
            }catch (\Exception $exception){
                $tr->rollBack();
                $msg = $exception->getMessage();
                return ['code'=>0,'msg'=>$msg];
            }
        }
        $roles = $operator->getRoles();
        foreach ($roles as $k=>$v)
            $data[$v['type']] = $v['name'];
        return $this->render('add',[
            'model'=>$operator,
            'roles' =>$data
        ]);
    }
    /*
     * 删除管理员
     * @param id post方式接收被删除管理员id
     */
    public function actionDel(){
        if(Yii::$app->request->isAjax){
            $this->returnJson();
            $id = Yii::$app->request->post('id');
            if($id==1) return ['code'=>0,'desc'=>'系统管理员无法删除'];
            //开始事务
            $tr = Yii::$app->db->beginTransaction();
            try{
                //删除主表operators
                if(Operators::deleteAll(['id'=>$id])!==1)
                    throw new Exception("删除主表信息失败");
                if(OperatorsInfo::deleteAll(['operator_id'=>$id])!==1)
                    throw new Exception("删除副表信息失败");
                $tr->commit();
                return ['code'=>200];
            }catch (\Exception $e){
                $tr->rollBack();
                $msg = $e->getMessage();
                return ['code'=>0,'msg'=>$msg];
            }
        }
    }
    /*
     * 验证(新增和更新管理员)
     */
    public function actionValidate($id = '')
    {
        $id and $model = Operators::findOne($id) or $model = new Operators();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($model);
        }
    }

    public function actionChangepwd()
    {
        if(Yii::$app->request->isAjax){
            $this->returnJson();
            $id = Yii::$app->request->post('id');
            $new_pwd = Yii::$app->request->post('pwd');
            $new_pwd_hash = Yii::$app->getSecurity()->generatePasswordHash($new_pwd);
            if(Operators::updateAll(['password'=>$new_pwd_hash],['id'=>$id]))
                return ['code'=>200];
            return ['code'=>0];
        }
    }

    public function actionResetPwd()
    {
        $id = Yii::$app->request->get('id');
        $this->layout = 'main_large_frame';
        $model = Operators::findOne(['id' => $id]);
        $pwd = new \app\models\ResetPwd();
        if (Yii::$app->request->isAjax && $pwd->load(Yii::$app->request->post())) {
            $this->returnJson();
            if ($pwd->validate()) {
                $rs = Yii::$app->db->createCommand("update operators set password=:password where id=:id", [
                    ':password' => Yii::$app->security->generatePasswordHash($pwd->re_pwd),
                    ':id' => $id
                ])->execute();
                if ($rs) {
                    return [
                        'code' => 0,
                        'desc' => '重置密码成功',
                    ];
                } else {
                    return [
                        'code' => 9999,
                        'desc' => '重置密码失败',
                    ];
                }
            }
        }
        return $this->render('reset-pwd', [
            'model' => $model,
            'pwd' => $pwd
        ]);
    }

    public function actionUpdate($id = '')
    {
        $model = Operators::find()->where(['id' => $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $this->returnJson();
            if (!$model->validate()) {
                $errors = $model->errors;
                return [
                    'code' => 9999,
                    'desc' => $errors[array_keys($errors)[0]][0]
                ];
            }
            if ($model->save()) {
                return [
                    'code' => 0,
                    'desc' => '信息修改成功'
                ];
            } else {
                return [
                    'code' => 9999,
                    'desc' => $model->errors
                ];
            }
        }
        return $this->render('update', [
            'model' => $model
        ]);
    }
//    public function actionDel()
//    {
//        if(Yii::$app->request->isAjax){
//            $this->returnJson();
//            $id = Yii::$app->request->post('id','');
//            if($id==1) return ['code'=>0,'desc'=>'系统管理员无法删除'];
//            $tr = Yii::$app->db->beginTransaction();
//            try{
//                if(Operators::deleteAll(['id'=>$id])!==1) throw new Exception('删除管理员失败');
//                if(AuthAssignment::deleteAll(['user_id'=>$id])!==1) throw new Exception('删除管理员失败');
//                $tr->commit();
//                return ['code'=>200];
//            }catch (\Exception $e){
//                $tr->rollBack();
//                return ['code'=>0,'desc'=>$e->getMessage()];
//            }
//        }
//    }

    /**
     * 选择父级单位
     */
    public function actionSelectRole()
    {
        $this->layout = 'main_large_frame';
        $connection = Yii::$app->db; //连接
        $sql = "select * from auth_item where type =:type";
        $command = $connection->createCommand($sql, [
            ':type' => 1
        ])->queryAll();
        return $this->render('select-role', [
            'commands' => $command
        ]);
    }

    //验证密码
    public function actionValidatePwd()
    {
        $model = new Pwd();
        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($model);
        }
    }


    public function actionValidateResetPwd()
    {
        $model = new \app\models\ResetPwd();
        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return \yii\bootstrap\ActiveForm::validate($model);
        }
    }

}
