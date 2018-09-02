<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/7
 * Time: 16:26
 */
use yii\helpers\Url;
?>
<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>标签设置</h3>
                <div class="span10 pull-right">
                    <a href="<?= Url::toRoute(['goods-label/change']) ?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建标签
                    </a>
                </div>
            </div>
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->beginBlock('script'); ?>
    <script>
//        $(function () {
//            alert(22)
//        })
        layui.use('layer', function() {
            var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
            //触发事件
            var active = {
                //删除动作
                del: function (id) {
                    layer.confirm('您确定要删除此标签？', {
                        btn: ['是', '否'] //按钮
                    }, function () {
                        $.ajax({
                            url: '<?= Url::toRoute('goods-label/del')?>',
                            type: 'post',
                            data: {id: id},
                            success: function (data) {
                                if (data.code == 200) {
                                    layer.msg('已删除')
                                } else {
                                    layer.msg('删除失败')
                                }
                                setTimeout(window.location.reload(), 2000);
                            }
                        })
                        layer.msg('已删除', {icon: 1});
                    }, function () {
                        layer.msg('已取消', {icon: 1});
                    });

                },
            }
            //layer触发点击按钮事件
            $('.label').on('click', function(){
                var type = $(this).data('type');
                console.log(type)
                var id = $(this).attr('id')
                active[type] ? active[type].call(this,id) : '';
            });
        })
    </script>
<?php $this->endBlock(); ?>