<?php
use app\components\AjaxPager;
?>
<div class="row-fluid table">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="span4 sortable">
                <span class="line"></span> 序号
            </th>
            <th class="span3 sortable">
                <span class="line"></span>头像
            </th>
            <th class="span2 sortable">
                <span class="line"></span>角色
            </th>
            <th class="span2 sortable">
                <span class="line"></span>真实姓名
            </th>
            <th class="span2 sortable">
                <span class="line"></span>联系电话
            </th>
            <th class="span3 sortable align-right">
                <span class="line"></span>操作
            </th>
        </tr>
        </thead>

        <tbody>
        <!-- row -->
        <tr class="first">
            <?php foreach ($OperatorsInfos as $key => $operator): ?>
                <td><?= $key + 1 + $pager->offset ?></td>
                <td>
                    <img src="<?= $operator->head_pic ?>" class="img-circle avatar hidden-phone" />
                    <a href="user-profile.html" class="name"><?= $operator->operator_name ?></a>
                    <span class="subtext"><?= $operator->company ?></span>
                </td>
                <td>
                    <?= isset($roles[$operator['auth']['item_name']])?$roles[$operator['auth']['item_name']]:""; ?>
                </td>
                <td>
                    <?= $operator->truename ?>
                </td>
                <td class="align-right">
                    <a href="#"><?= $operator->contact_phone ?></a>
                </td>
                <td>
                    <span>重置密码</span>
                    <span>删除</span>
                    <span>编辑</span>
                </td>
            <?php endforeach; ?>
        </tr>
        <!-- row -->
        </tbody>
    </table>
</div>

<div class="pagination pull-right">
    <?php
        echo AjaxPager::widget([
            'pagination' => $pager
        ]);
    ?>
</div>

