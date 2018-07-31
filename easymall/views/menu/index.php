<?php
use yii\bootstrap\Html;
use yii\helpers\Url;
?>
<!-- libraries -->
<link href="static/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

<!-- this page specific styles -->
<link rel="stylesheet" href="static/css/compiled/tables.css" type="text/css" media="screen" />

<!-- open sans font -->
<link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

<!-- main container -->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper">
            <!-- menu list-->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>菜单</h4>
                    </div>
                </div>
                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <a class="btn-flat success new-product">+ 创建菜单</a>
                    </div>
                </div>
                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <span class="line"></span>名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>菜单路由
                            </th>
                            <th class="span3">
                                <span class="line"></span>功能路由
                            </th>
                            <th class="span3">
                                <span class="line"></span>控制器列表
                            </th>
                            <th class="span3">
                                <span class="line"></span>状态
                            </th>
                            <th class="span3">
                                <span class="line"></span>权重
                            </th>
                            <th class="span3">
                                <span class="line"></span>操作
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php foreach ($menu as $vo): ?>
                            <tr class="first">
                                <td><?= $vo['name'] ?></td>
                                <td><?= $vo['route'] ?></td>
                                <td style="word-wrap:break-word;word-break:break-all;"><?= $vo['act'] ?></td>
                                <td style="word-wrap:break-word;word-break:break-all;"><?= $vo['attr'] ?></td>
                                <td><?= $vo['display'] > 1 ? '<span class="label label-success">显示</span>' : '<span class="label label-info">隐藏</span>' ?></td>
                                <td><?= ($vo['sort'] == '' ? '' : $vo['sort']) ?></td>
                                <td>
                                    <ul class="actions">
                                        <?php if (\app\components\Utils::checkAccess("menu/update")): ?>
                                            <li><a href="<?= Url::toRoute(['menu/update', 'id' => $vo['id']]) ?>">编辑</a></li>
                                        <?php endif; ?>
                                        <?php if (\app\components\Utils::checkAccess("menu/delete")): ?>
                                            <li class="last"><a href="javascript:void(0)" onclick="del(<?=$vo['id']?>)">删除</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </td>
                            </tr>
                                <!--二级菜单-->
                                <?php if (!empty($vo['_child'])): ?>
                                    <?php foreach ($vo['_child'] as $v): ?>
                                        <tr>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;|--<?= $v['name'] ?></td>
                                            <td><?= $v['route'] ?></td>
                                            <td style="word-wrap:break-word;word-break:break-all;"><?= $v['act'] ?></td>
                                            <td style="word-wrap:break-word;word-break:break-all;"><?= $v['attr'] ?></td>
                                            <td><?= $v['display'] > 1 ? '<span class="label label-success">显示</span>' : '<span class="label label-info">隐藏</span>' ?></td>
                                            <td><?= ($v['sort'] == '' ? '' : $v['sort']) ?></td>
                                            <td>
                                                <ul class="actions">
                                                    <?php if (\app\components\Utils::checkAccess("menu/update")): ?>
                                                        <li><a href="<?= Url::toRoute(['menu/update', 'id' => $v['id']]) ?>">编辑</a></li>
                                                    <?php endif; ?>
                                                    <?php if (\app\components\Utils::checkAccess("menu/delete")): ?>
                                                        <li class="last"><a href="javascript:void(0)" onclick="del(<?=$v['id']?>)">删除</a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </td>
                                        </tr>
                                        <!--三级菜单-->
                                        <?php if (!empty($v['_child'])): ?>
                                            <?php foreach ($v['_child'] as $v3): ?>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|----<?= $v3['name'] ?></td>
                                                    <td><?= $v3['route'] ?></td>
                                                    <td style="word-wrap:break-word;word-break:break-all;"><?= $v3['act'] ?></td>
                                                    <td style="word-wrap:break-word;word-break:break-all;"><?= $v3['attr'] ?></td>
                                                    <td><?= $v3['display'] > 1 ? '<span class="label label-success">显示</span>' : '<span class="label label-info">隐藏</span>' ?></td>
                                                    <td><?= ($v3['sort'] == '' ? '' : $v3['sort']) ?></td>
                                                    <td>
                                                        <ul class="actions">
                                                            <?php if (\app\components\Utils::checkAccess("menu/update")): ?>
                                                                <li><a href="<?= Url::toRoute(['menu/update', 'id' => $v3['id']]) ?>">编辑</a></li>
                                                            <?php endif; ?>
                                                            <?php if (\app\components\Utils::checkAccess("menu/delete")): ?>
                                                                <li class="last"><a href="javascript:void(0)" onclick="del(<?=$v3['id']?>)">删除</a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->
        </div>
    </div>
</div>

<!--</div>-->
<?php $this->beginBlock('script') ?>
<script type="text/javascript">
    function del(id) {
        var flag = confirm('您确定删除此权限及子权限吗？');
        if (flag) {
            $.ajax({
                url: "<?= Url::toRoute('menu/delete') ?>",
                type: 'post',
                data: {id: id},
                success: function (data) {
                    if (data.code == 200) {
                        showToast('success', '删除成功', '权限及子权限已成功删除！', 2000);
                        window.location.reload();
                    } else if (data.code == 0) {
                        showToast('error', '删除失败', '请稍后重试', 2000);
                        window.location.reload();
                    }
                }
            });
        }
    }
</script>
<?php $this->endBlock(); ?>
