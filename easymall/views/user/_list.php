<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/6
 * Time: 21:19
 */
use app\components\AjaxPager;
?>
<link rel="stylesheet" href="static/css/compiled/user-list.css" type="text/css" media="screen" />
<div class="row-fluid table">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="span4 sortable">
                <span class="line"></span> 序号
            </th>
            <th class="span3 sortable">
                <span class="line"></span>用户名字
            </th>
            <th class="span2 sortable">
                <span class="line"></span>VIP
            </th>
            <th class="span2 sortable">
                <span class="line"></span>是否首次登陆
            </th>

            <th class="span2 sortable">
                <span class="line"></span>操作
            </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($userInfo as $key => $user): ?>
            <tr class="first">
                <td width="10%"><?= $key + 1 + $pager->offset ?></td>
                <td>
                    <?= $user['username'] ?>
                </td>
                <td>
                    <?= $user['is_vip']==1 ? "是" : "否"  ?>
                </td>
                <td>
                    <?=  $user['is_first_login']==1 ? "是" : "否"  ?>
                </td>
                <td>
                    <a href="<?= \yii\helpers\Url::toRoute(['supplier/change','supplier_id'=>$user['id']])?>"><span class="label label-success">编辑</span></a>
                    <span class="label label-warning" data-type="del" id="<?= $user['id']?>">删除</span>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="pagination pull-right">
    <?php echo AjaxPager::widget([
        'pagination' => $pager
    ]);
    ?>
</div>

