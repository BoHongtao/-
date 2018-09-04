<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/3
 * Time: 21:13
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
                <span class="line"></span>供货商名字
            </th>
            <th class="span2 sortable">
                <span class="line"></span>联系人
            </th>
            <th class="span2 sortable">
                <span class="line"></span>联系人电话
            </th>
            <th class="span2 sortable">
                <span class="line"></span>联系人地址
            </th>
            <th class="span2 sortable">
                <span class="line"></span>供货商描述
            </th>
            <th class="span2 sortable">
                <span class="line"></span>操作
            </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($supplierInfo as $key => $supplier): ?>
            <tr class="first">
                <td width="10%"><?= $key + 1 + $pager->offset ?></td>
                <td>
                    <?= $supplier['supplier_name'] ?>
                </td>
                <td>
                    <?=  $supplier['link_name'] ?>
                </td>
                <td>
                    <?=  $supplier['link_tel'] ?>
                </td>
                <td>
                    <?=  $supplier['link_address'] ?>
                </td>
                <td>
                    <?=  $supplier['desc'] ?>
                </td>
                <td>
                    <a href="<?= \yii\helpers\Url::toRoute(['supplier/change','supplier_id'=>$supplier['id']])?>"><span class="label label-success">编辑</span></a>
                    <span class="label label-warning" data-type="del" id="<?= $supplier['id']?>">删除</span>
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


