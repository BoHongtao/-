<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/31
 * Time: 8:55
 */
namespace app\models;
use yii\db\ActiveRecord;

class Base extends  ActiveRecord{

    public $file;
    //上传单个文件
    public function upload()
    {
        if (!$this->file) return;
        $uploadinfo = $this->getUploadInfo($this->file->extension);
        if($this->file->saveAs($uploadinfo['path'].$uploadinfo['name']))
            return $uploadinfo['name'];
        return false;
    }

    // 返回上传文件信息
    function getUploadInfo($extension){
        $name = getUuid().'.'.$extension;
        $folder = substr($name,0,2);
        $path = __DIR__.'/../web/uploads/'.$folder.'/';
        createFolder($path);
        return [
            "name" => $name,
            "floder" => $folder,
            "path" => $path
        ];
    }
}