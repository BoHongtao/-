<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/9
 * Time: 21:20
 */
namespace app\controllers;

use app\models\Footer;
use Yii;

class FooterController extends BaseController
{
    /*
     * 页脚展示
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * 数据
     */
    public function actionData()
    {
        $query = Footer::find();
        $pager = $this->Pager($query, 'footer/data');
        $footerInfo = $query->offset($pager->offset)->limit($pager->limit)->asArray()->all();
        return $this->renderPartial('_list', [
            'footerInfo'=>$footerInfo,
            'pager'=>$pager
        ]);
    }
    /*
     * 页脚编辑
     */
    public function actionUpdate()
    {
        echo 222;
    }

}

