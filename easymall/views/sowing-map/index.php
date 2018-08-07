<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/6
 * Time: 13:37
 */
use yii\helpers\Url;
?>
<!--<link rel="stylesheet" href="static/layer/css/layui.css">-->

<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>轮播图设置</h3>
                <div class="span10 pull-right">
                    <span class="btn-flat success pull-right" data-type="add_pic">&#43;&nbsp;&nbsp;添加</span>
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

<div id="replace_pic" style="display: none;padding: 20px;">
    <div class="layui-upload">
        <button type="button" class="layui-btn" id="test1">上传图片</button>
        <div class="layui-upload-list">
            <img class="layui-upload-img" src="" id="demo1">
            <p id="demoText"></p>
        </div>
    </div>
</div>

<?php $this->beginBlock('script'); ?>
<script>
    layui.use('carousel', function(){
        //轮播图
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
            elem: '#test1'
            ,width: '100%' //设置容器宽度
            ,arrow: 'always' //始终显示箭头
        });
    });

layui.use('layer', function() {
    //显示弹框多图上传
    var $ = layui.jquery;
    var layer = layui.layer; //独立版的layer无需执行这一句
    //触发事件
    var active = {
        //多图上传
        add_pic: function(){
            layer.open({
                type: 2,
                content: "<?= Url::toRoute(['sowing-map/upload'])?>",
                area: ['800px', '500px'],
                maxmin: true
            });
        },
        //删除其中一张轮播图
        del:function (id) {
            layer.confirm('您确定要删除此图片？', {
                btn: ['是','否'] //按钮
            },function(){
                $.ajax({
                    url: '<?= Url::toRoute('sowing-map/del')?>',
                    type: 'post',
                    data: {id: id},
                    success: function (data) {
                        if (data.code == 200){
                            layer.msg('已删除')
                        }else{
                            layer.msg('删除失败,原因是'+data.msg)
                        }
                        setTimeout(window.location.reload(),2000);
                    }
                });
                layer.msg('已删除', {icon: 1});
            }, function(){
                layer.msg('已取消', {icon: 1});
            });
        }
    };
    $('.btn-flat').on('click', function () {
        var type = $(this).data('type');
        active[type] ? active[type].call(this) : '';
    });
    $('.label').on('click', function () {
        var type = $(this).data('type');
        var id = $(this).attr('id');
        active[type] ? active[type].call(this,id) : '';
    });
})

</script>
<?php $this->endBlock('script'); ?>
