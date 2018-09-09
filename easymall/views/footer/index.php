<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/9
 * Time: 21:45
 */
?>
<!--<link rel="stylesheet" href="static/layer/css/layui.css">-->

<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>页脚设置</h3>
            </div>
            <!-- Users table -->
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>