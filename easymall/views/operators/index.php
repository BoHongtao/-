<?php
use yii\helpers\Url;
?>
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>管理员设置</h3>
                <div class="span10 pull-right">
                    <form id="searchform" class="form-inline" role="form">
                        <input type="text" name="operator_name" class="span5 search" placeholder="管理员名字"/>
                        <div class="ui-dropdown">
                            <div class="head" data-toggle="tooltip" title="Click me!" onclick="search()">
                                点击搜索
                            </div>
                        </div>
                    </form>
                    <a href="<?= Url::toRoute(['operators/add'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建管理员
                    </a>
                </div>
            </div>
            <!-- Users table -->
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->
<?php $this->beginBlock('script') ?>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/theme.js"></script>
<script src="static/layer/layui.js"></script>
<script>
    layui.use('layer', function(){
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        //触发事件
        var active = {
            //删除动作
            del: function(id){
                layer.confirm('您确定要删除此管理员？', {
                    btn: ['是','否'] //按钮
                }, function(){
                    $.ajax({
                        url: '<?= Url::toRoute('operators/del')?>',
                        type: 'post',
                        data: {id: id},
                        success: function (data) {
                            if (data.code == 200){
                                layer.msg('已删除')
                            }else{
                                layer.msg('删除失败')
                            }
                        }
                    })
                    layer.msg('已删除', {icon: 1});
                }, function(){
                    layer.msg('已取消', {icon: 1});
                });
            },
            changepwd: function(id){
                layer.open({
                    title:'重置密码',
                    type: 1,
                    skin: 'layui-layer-rim',
                    area: ['400px', '250px'],
                    content: $('#changepassword'+id)
                });
            }
        };
        //layer触发点击按钮事件
        $('.label').on('click', function(){
            var type = $(this).data('type');
            var id = $(this).attr('id')
            active[type] ? active[type].call(this,id) : '';
        });
    });
    /*
     * 按照登陆名字搜索
     */
    function search() {
        $.ajax({
            url: "<?= Url::to(['operators/data']) ?>",
            data: $('#searchform').serialize(),
            beforeSend: function (xhr) {
                $('#unseen').append('<div style="text-align:center;"><span class="ui-icon icon-refresh green"></span></div>');
            },
            success: function (data) {
                $('#unseen').html(data);
            },
            complete: function (xhr, sc) {
                $('#loading').remove();
            }
        });
    }
    /*
     *  修改密码
     */
    function changepwd(id) {
        layui.use('layer', function(){
            var layer = layui.layer;
        });
        newpwd = $('#newpwd'+id).val();
        re_newpwd = $('#re_newpwd'+id).val();
        if (newpwd!=re_newpwd){
            layer.msg('密码不一致，请重新输入');
        }else if (newpwd==''){
            layer.msg('密码不能为空');
        }else{
            $.ajax({
                url : '<?= Url::toRoute(['operators/changepwd']) ?>',
                type: 'post',
                data: {id: id,pwd:newpwd},
                success: function (data) {
                    if (data.code == 200){
                        layer.msg('已重置密码');
                        layer.closeAll('page');
                    }else{
                        layer.msg('重置密码失败');
                        layer.closeAll('page');
                    }
                }
            })
        }
    }
</script>
<?php $this->endBlock()?>