<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:52
 */
use app\components\AjaxPager;

?>
<link rel="stylesheet" href="static/css/compiled/user-list.css" type="text/css" media="screen"/>
<div class="row-fluid table">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="span4 sortable">
                <span class="line"></span> ID
            </th>
            <th class="span3 sortable">
                <span class="line"></span>公司名称
            </th>
            <th class="span2 sortable">
                <span class="line"></span>预留电话
            </th>
            <th class="span2 sortable">
                <span class="line"></span>模块1
            </th>
            <th class="span2 sortable">
                <span class="line"></span>模块2
            </th>
            <th class="span2 sortable">
                <span class="line"></span>模块3
            </th>
            <th class="span2 sortable">
                <span class="line"></span>模块4
            </th>
            <th class="span2 sortable">
                <span class="line"></span>使用状况
            </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($footerInfo as $key=>$v): ?>
            <tr class="first">
                <td width="5%"><?= $key + 1 + $pager->offset ?></td>
                <td width="10%"><?= $v['copyright'] ?></td>
                <td width="10%"><?= $v['phone'] ?></td>
                <td width="10%"><a href="<?= $v['module_url_1'] ?>"><?= $v['module_name_1'] ?></a></td>
                <td width="10%"><a href="<?= $v['module_url_2'] ?>"><?= $v['module_name_2'] ?></a></td>
                <td width="10%"><a href="<?= $v['module_url_3'] ?>"><?= $v['module_name_3'] ?></a></td>
                <td width="10%"><a href="<?= $v['module_url_4'] ?>"><?= $v['module_name_4'] ?></a></td>
                <td width="10%"><?= $v['flag']==0 ? "未使用" : "使用中" ?></td>
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