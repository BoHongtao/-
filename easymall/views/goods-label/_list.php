<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:52
 */
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
                <span class="line"></span>标签名字
            </th>
            <th class="span3 sortable">
                <span class="line"></span>权重
            </th>
            <th class="span2 sortable">
                <span class="line"></span>操作
            </th>
        </tr>
        </thead>

        <tbody>
        <?php if(empty($labelInfo)): ?>
            <tr class="first"><td>暂无标签</td></tr>
        <?php else: ?>
            <?php foreach ($labelInfo as $key => $v): ?>
                <tr class="first">
                    <td width="10%"><?= $key + 1 ?></td>
                    <td><?= $v['label_name'] ?></td>
                    <td><?= $v['sort'] ?></td>
                    <td>
                        <a href="<?= \yii\helpers\Url::toRoute(['goods-label/change','id'=>$v['id']]) ?>"><span class="label label-success">编辑</span></a>
                        <span class="label label-warning" data-type="del" id="<?=$v['id']?>">删除</span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>