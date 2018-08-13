<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:26
 */
use yii\helpers\Url;
?>
<!--<link rel="stylesheet" href="static/layer/css/layui.css">-->

<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>类型设置</h3>
                <div class="span10 pull-right">
                    <a href="<?= Url::toRoute(['good-type/add']) ?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建类别
                    </a>
                </div>
            </div>
            <!-- Users table -->
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>