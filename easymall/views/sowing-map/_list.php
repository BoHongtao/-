<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/6
 * Time: 13:45
 */
use app\components\AjaxPager;
?>
<!--轮播图展示-->
<div class="layui-carousel" id="test1" lay-filter="test1">
    <div carousel-item>
        <?php foreach ($info as $k=>$v):?>
            <div><img src="<?=  picPath($v['pic'])  ?>" alt="" width="100%" height="100%"></div>
        <?php endforeach; ?>
    </div>
</div>
<br/>
<!--轮播文件列表-->
<div class="row-fluid table">
    <table class="table table-hover">
        <tr>
            <th class="span3 sortable">ID</th>
            <th class="span4 sortable">地址</th>
            <th class="span4 sortable">图片</th>
            <th class="span3 sortable">操作</th>
        </tr>
        <?php foreach ($info as $k=>$v):?>
            <tr>
                <td><?= $k+1 ?></td>
                <td><?= picPath($v['pic']) ?></td>
                <td><img src="<?= picPath($v['pic']) ?>" alt="" width="80px" height="80px"></td>
                <td>
                    <span class="label label-warning" data-type="del" id="<?=$v['id']?>">删除</span>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="pagination pull-right">
    <?php echo AjaxPager::widget([
        'pagination' => $pager
    ]);
    ?>
</div>