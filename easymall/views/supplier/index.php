<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/3
 * Time: 20:48
 */
?>

<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>供货商管理</h3>
                <div class="span10 pull-right">
                    <a href="<?= \yii\helpers\Url::toRoute(['good-type/add']) ?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        增加供货商
                    </a>
                </div>
            </div>
            <!-- Users table -->
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
        </div>
        <!-- end users table -->
    </div>
</div>