<?php
use yii\helpers\Url;
?>
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>管理员设置</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="Type a user's name..."/>
                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="Click me!">
                            Filter users
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <p class="title">
                                    Show users where:
                                </p>
                                <div class="form">
                                    <select>
                                        <option/>
                                        Name
                                        <option/>
                                        Email
                                        <option/>
                                        Number of orders
                                        <option/>
                                        Signed up
                                        <option/>
                                        Last seen
                                    </select>
                                    <select>
                                        <option/>
                                        is equal to
                                        <option/>
                                        is not equal to
                                        <option/>
                                        is greater than
                                        <option/>
                                        starts with
                                        <option/>
                                        contains
                                    </select>
                                    <input type="text"/>
                                    <a class="btn-flat small">Add filter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="<?= Url::toRoute(['operators/add'])?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建管理员
                    </a>
                </div>
            </div>
            <!-- Users table -->
            <?php echo $this->context->actionData() ?>
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
            }
        };
        //layer点击删除按钮事件
        $('.layui-btn-sm').on('click', function(){
            var type = $(this).data('type');
            var id = $(this).attr('id')
            active[type] ? active[type].call(this,id) : '';
        });
    });
</script>
<?php $this->endBlock()?>