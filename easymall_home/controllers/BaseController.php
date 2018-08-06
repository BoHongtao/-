<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/30
 * Time: 16:21
 */
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\components\Utils;

class BaseController extends Controller{
    public $pageSize;

    public function init()
    {
        parent::init();
        $this->pageSize = Yii::$app->params ['pageSize'];
    }

    //response a json format
    public function returnJson()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }

    // return curl error message
    public function getMsg($model)
    {
        $errors = $model->errors;
        return $errors [array_keys($errors) [0]] [0];
    }

    // pagination
    public function Pager($model, $route)
    {
        return new \yii\data\Pagination ([
            'totalCount' => $model->count(),
            'pageSize' => $this->pageSize,
            'route' => $route
        ]);
    }
}