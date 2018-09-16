<?php
use yii\helpers\Url;

?>
<!-- navbar -->
<div class="header_con">
    <div class="header">
        <div class="welcome fl">
            <?php if (!Yii::$app->user->isGuest) {echo Yii::$app->user->identity->username .",";} ?>
            <?php if (!Yii::$app->user->isGuest) {?><a href="<?php echo Url::toRoute(['user/logout']) ?>">退出</a><?php } ?> 欢迎来到天天生鲜 !
        </div>
        <div class="fr">
            <?php if (Yii::$app->user->isGuest): ?>
                <div class="login_btn fl">
                    <a href="<?= Url::to(['user/login'])?>">登录</a>
                    <span>|</span>
                    <a href="<?= Url::to(['user/register'])?>">注册</a>
                    <span>|</span>
                </div>
            <?php endif;?>
            <div class="user_link fl">
                <a href="user_center_info.html">用户中心</a>
                <span>|</span>
                <a href="cart.html">我的购物车</a>
                <span>|</span>
                <a href="user_center_order.html">我的订单</a>
            </div>
        </div>
    </div>
</div>
<!-- end navbar -->