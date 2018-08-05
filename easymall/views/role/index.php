<?php
use yii\helpers\Url;
?>
<link rel="stylesheet" href="static/css/compiled/user-list.css" type="text/css" media="screen" />
<link href="static/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
<!--<link href="static/layer/css/layui.css" type="text/css" rel="stylesheet" />-->
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>角色管理</h3>
                <div class="span10 pull-right">
                    <a href="<?= Url::toRoute(['role/create-role'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建角色
                    </a>
                </div>
            </div>
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span4 sortable">
                                <span class="line"></span> 角色名
                            </th>
                            <th class="span3 sortable">
                                <span class="line"></span>描述
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>创建时间
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                    <!-- row -->
                    <?php if (empty($roles)): ?>
                        <tr>
                            <td colspan="13" class="text-center">暂无数据</td>
                        </tr>
                    <?php else: ?>
                    <?php foreach ($roles as $key => $role): ?>
                        <tr class="first">
                            <td width="10%"><?= $role->name  ?></td>
                            <td><?= $role->description?></td>
                            <td><?= date("Y-m-d H:i:s", $role->created_at) ?></td>
                            <td>
                                <span class="label label-info" data-type="changepwd" onclick="quanxian('<?= $role->name ?>')">权限控制</span>
                                <span class="label label-warning" data-type="del" onclick="del('<?= $role->name?>')">删除</span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif;?>
                    <!-- row -->
                    </tbody>
                </table>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->
<?php $this->beginBlock('script') ?>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/theme.js"></script>
<script>
    layui.use('layer', function(){
        var layer = layui.layer;
    });

    /*
     * 删除角色
     */
    function del(name){
        flag = layer.confirm('您确定要删除此管理员？', {
            btn: ['是','否'] //按钮
        },function () {
            $.ajax({
                url:'<?= Url::toRoute(['role/del'])?>',
                type:'post',
                data:{name:name},
                success:function (data) {
                    if(data.code == 200){
                        layer.msg('删除角色成功');
                        setTimeout(window.location.reload(),2000);
                    }else{
                        layer.msg('删除角色失败');
                    }
                },
                error:function (data) {
                    layer.msg('系统错误，请稍后重试');
                }
            })
        })
    }
    /*
     *  权限页面
     */
    function quanxian(name) {
        layer.open({
            type: 2
            ,content: '<?= Url::toRoute(['role/quanxian']) ?>&name=' + name
            ,area: ['900px', '500px']
            ,maxmin: true,
            shadeClose:true,
            closeBtn:1
        });
    }

</script>
<?php $this->endBlock()?>

