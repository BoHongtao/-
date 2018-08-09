<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:52
 */
?>
<link rel="stylesheet" href="static/css/compiled/user-list.css" type="text/css" media="screen" />
<div class="row-fluid table">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="span4 sortable">
                    <span class="line"></span> ID
                </th>
                <th class="span3 sortable">
                    <span class="line"></span>类型名称
                </th>
                <th class="span2 sortable">
                    <span class="line"></span>前台主图
                </th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($typeInfo as $key=>$v): ?>
            <tr class="first">
                <td width="10%"><?= $key + 1 + $pager->offset ?></td>
                <td><?= $v['type'] ?></td>
                <td><?= $v['filename'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>