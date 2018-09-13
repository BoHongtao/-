<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/10
 * Time: 21:32
 */
use app\components\AjaxPager;
?>
<link rel="stylesheet" href="static/css/compiled/user-list.css" type="text/css" media="screen"/>
<div align="left">
    <a href="<?= \yii\helpers\Url::toRoute(['goods/add-good'])?>" class="btn-flat success">
        <span>&#43;</span>
        发布商品
    </a>
</div>
<div align="right">
    <form action="">
        <input type="text" name="good_name" placeholder="要搜索的商品名称">
        <select name="good_type" style="height: 35px">
            <option value="">请选择商品分类</option>
            <?php foreach ($goodType as $k=>$v): ?>
                <option value="<?= $v['id']?>"><?=$v['type'] ?></option>
            <?php endforeach; ?>
        </select>

        <div class="ui-dropdown">
            <div class="head" data-toggle="tooltip" title="Click me!" onclick="search()">
                点击搜索
            </div>
        </div>

    </form>
</div>
<div class="row-fluid table">
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="span4 sortable">
                <span class="line"></span> ID
            </th>
            <th class="span3 sortable">
                <span class="line"></span>商品名称
            </th>
            <th class="span2 sortable">
                <span class="line"></span>销售价格
            </th>
            <th class="span2 sortable">
                <span class="line"></span>总库存
            </th>
            <th class="span2 sortable">
                <span class="line"></span>销量
            </th>
            <th class="span2 sortable">
                <span class="line"></span>上下架
            </th>
            <th class="span2 sortable">
                <span class="line"></span>操作
            </th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($goodsInfo as $key => $v): ?>
            <tr class="first">
                <td width="10%"><?= $key + 1 + $pager->offset ?></td>
                <td width="10%"><?= $v['good_name'] ?></td>
                <td width="10%"><?= $v['price_sale'] ?></td>
                <td width="10%"><?= $v['count_total'] ?></td>
                <td width="10%"><?= $v['count_sale'] ?></td>
                <td width="10%"><?= $v['is_sale'] ?></td>
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

