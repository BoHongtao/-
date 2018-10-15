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
            <th class="span2 sortable">
                <span class="line"></span> ID
            </th>
            <th class="span4 sortable">
                <span class="line"></span>公司名称
            </th>
            <th class="span3 sortable">
                <span class="line"></span>预留电话
            </th>
            <th class="span3 sortable">
                <span class="line"></span>模块1
            </th>
            <th class="span3 sortable">
                <span class="line"></span>模块2
            </th>
            <th class="span3 sortable">
                <span class="line"></span>模块3
            </th>
            <th class="span3 sortable">
                <span class="line"></span>模块4
            </th>
            <th class="span3 sortable">
                <span class="line"></span>使用状况
            </th>
            <th class="span3 sortable">
                <span class="line"></span>设置
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($footerInfo as $key => $v): ?>
            <tr class="first">
                <td><?= $key + 1 + $pager->offset ?></td>
                <td><?= $v['copyright'] ?></td>
                <td><?= $v['phone'] ?></td>
                <td><a href="<?= $v['module_url_1'] ?>"><?= $v['module_name_1'] ?></a></td>
                <td><a href="<?= $v['module_url_2'] ?>"><?= $v['module_name_2'] ?></a></td>
                <td><a href="<?= $v['module_url_3'] ?>"><?= $v['module_name_3'] ?></a></td>
                <td><a href="<?= $v['module_url_4'] ?>"><?= $v['module_name_4'] ?></a></td>
                <td><?= $v['flag']==0 ? "未使用" : "使用中" ?></td>
                <td>
                    <form class="layui-form layui-form-pane1" action="" lay-filter="first">
                        <input type="checkbox" name="close" lay-skin="switch" title="开关">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="pagination pull-right">
    <?php echo AjaxPager::widget([
        'pagination' => $pager
    ]); ?>
    
</div>

<?php $this->beginBlock('script') ?>
    <script>
        layui.use('form', function(){
            var form = layui.form;
            //初始赋值

            form.on('switch', function(data){
                console.log(data);
            });
        });
    </script>
<?php $this->endBlock() ?>