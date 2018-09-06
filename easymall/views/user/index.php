<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/6
 * Time: 21:16
 */
?>


<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>用户管理</h3>
            </div>
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
        </div>
    </div>
</div>
