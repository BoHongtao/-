<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/30
 * Time: 16:19
 */

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_array($list, $code = 'code', $pk = 'id', $pid = 'pid', $child = 'c', $child_2 = 'a', $root = 0) {
    // 创建Tree
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = &$list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            //$region_type = $data['region_type'];
            if ($root == $parentId) {
                $list[$key]['p'] = $data['name'];
                $tree[] = &$list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $list[$key]['n'] = $data['name'];
                    $parent = &$refer[$parentId];
                    $parent[$child][] = &$list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0) {
    // 创建Tree
    $tree = array();
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] = & $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] = & $list[$key];
            } else {
                if (isset($refer[$parentId])) {
                    $parent = & $refer[$parentId];
                    $parent[$child][] = & $list[$key];
                }
            }
        }
    }
    return $tree;
}


function getTree($data,$pid=0,$level=0,$isClear=false){
    static $res = array();
    if($isClear===true){
        $res = array();
    }
    foreach($data as $k=>$v){
        if($v['pid'] == $pid){
            $res[] = $v;
            $v['level'] = $level;
            getTree($data,$v['id'],$level+1,false);
        }
    }
}

/*
 * 显示左侧菜单的方法
 */
function login(){
    //菜单表中的权限
    $omenus = \app\models\Menu::allMenuList(["display"=>2]);
    $auth = Yii::$app->authManager;
    if (Yii::$app->user->id === 1) {
        $res = $omenus;
    }else{
        $menus = array_keys($auth->getPermissionsByUser(Yii::$app->user->identity->id));
        foreach ($omenus as $k => $val) {
            $rolearr = explode(',', $val['act']);
            if(!empty($rolearr[0]) && !in_array($rolearr[0], $menus))
                unset($omenus[$k]);
        }
        $res = $omenus;
    }
    $menus = list_to_tree($res);
    foreach ($menus as $key => $value){
        if((!isset($value["_child"]) || count($value["_child"]) == 0) && empty($value["route"]))
            unset($menus[$key]);
    }
    return $menus;
}

/**
 * 递归创建目录
 */
function createFolder($path){
    if (!file_exists($path)) {
        createFolder(dirname($path));
        mkdir($path);
    }
}

/**
 * 生成uuid
 */
function getUuid() {
    $str = md5(uniqid(mt_rand(), true));
    $uuid = substr($str, 0, 8);
    $uuid .= substr($str, 8, 4);
    $uuid .= substr($str, 12, 4);
    $uuid .= substr($str, 16, 4);
    $uuid .= substr($str, 20, 12);
    return $uuid;
}

/*
 * 生成uuid
 */
function genUID(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s%s%s%s%s%s%s', str_split(bin2hex($data), 4));
}



// 获取图片显示路径
function picPath($file){
    return Yii::$app->params["file_upload"].substr($file,0,2)."/".$file;
}

/*
 * 删除某个文件
 * @param  file   路径
 * return  bool
 */
function deleteFile($filepath){
    if(is_file($filepath)){
        if(unlink($filepath))
            return true;
        return false;
    }
    return false;
}