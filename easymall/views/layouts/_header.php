<div class="navbar navbar-default" id="navbar">
    <div class="navbar-header pull-left">
        <a href="#" class="navbar-brand">
            <small>
                <i class="icon-leaf"></i>
                沙盘管理平台
            </small>
        </a>
    </div>
    <div class="navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
            <li class="light-blue">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <img class="nav-user-photo" src="static/avatars/user.jpg" alt="Jason's Photo"/>
                    <span class="user-info">
                        <small>欢迎光临,</small>
                        <?= Yii::$app->user->identity->operator_name; ?>
                    </span>

                    <i class="icon-caret-down"></i>
                </a>
                <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                    <li>
                        <a href="#" onclick="modifyPwdMe()">
                            <i class="icon-user"></i>
                            修改密码
                        </a>
                    </li>

                    <li class="divider"></li>

                    <li>
                        <a href="<?php echo yii\helpers\Url::to(['site/logout']) ?>">
                            <i class="icon-off"></i>
                            退出
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>