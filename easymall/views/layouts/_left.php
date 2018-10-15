<?php
use yii\helpers\Url;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$cations = $controller . '/' . $action;
//菜单表中的权限
$menus = login();
?>
<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
            <!--首页-->
            <li class="active">
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?= Url::toRoute('home/index') ?>">
                    <i class="icon-home"></i>
                    <span>后台首页</span>
                </a>
            </li>
        <?php foreach ($menus as $value) : ?>
            <?php if ($value['display'] == 2): ?>
                <?php $result = explode(',', $value['attr']); ?>
                    <li <?php if (in_array($controller, $result)): ?>class="active"<?php endif; ?>>
                        <a class="dropdown-toggle" href="<?= Url::toRoute([$value['route']]) ?>">
                            <i class="icon-group"></i>
                            <span><?php echo $value['name'] ?></span>
                            <i class="icon-chevron-down"></i>
                        </a>
                        <?php if (isset($value['_child'])): ?>
                            <ul class="submenu">
                                <?php foreach ($value['_child'] as $val) : ?>
                                    <?php if ($val['display'] == 2): ?>
                                        <?php if (isset($val['params'])): ?>
                                            <li<?php if ($cations == $val['route'] && $req == $val['params']): ?>class="active"<?php endif; ?>>
                                                <a href="<?= Url::toRoute([$val['route']]) ?>"><?php echo $val['name'] ?></a>
                                            </li>
                                            <?php else: ?>
                                            <li <?php if ($cations == $val['route']): ?>class="active"<?php endif; ?>>
                                                <a href="<?= Url::toRoute([$val['route']]) ?>"><?php echo $val['name'] ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>
<!-- end sidebar -->