<?php
use yii\helpers\Url;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$cations = $controller . '/' . $action;
?>
<!--左侧菜单-->
<?php
//菜单表中的权限
$menus = login();
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>
    <ul class="nav nav-list">
        <?php foreach ($menus as $value) : ?>
            <?php if ($value['display'] == 2): ?>
                <?php $result = explode(',', $value['attr']); ?>
                <li <?php if (in_array($controller, $result)): ?>class="active open" <?php endif; ?>>
                    <a href="<?= Url::toRoute([$value['route']]) ?>" class="dropdown-toggle">
                        <i class="icon-list"></i>
                        <span class="menu-text"> <?php echo $value['name'] ?> </span>
                        <?php if ('tourism/account_info' != $value['act']): ?>
                            <b class="arrow icon-angle-down"></b>
                        <?php endif; ?>
                    </a>
                    <?php if (isset($value['_child'])): ?>
                        <ul class="submenu">
                            <?php foreach ($value['_child'] as $val) : ?>
                                <?php if ($val['display'] == 2): ?>
                                    <?php if (isset($val['params'])): ?>
                                        <li <?php if ($cations == $val['route'] && $req == $val['params']): ?>class="active"<?php endif; ?>>
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
