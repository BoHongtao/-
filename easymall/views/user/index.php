<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/6
 * Time: 21:16
 */
?>
<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>用户管理</h3>
                <div class="span10 pull-right">
                    <form id="searchform" class="form-inline" role="form">
                        <input type="text" name="user_name" class="span5 search" placeholder="用户名字"/>
                        <div class="ui-dropdown">
                            <div class="head" data-toggle="tooltip" title="Click me!" onclick="search()">
                                点击搜索
                            </div>
                        </div>
                    </form>
                    <a href="<?= \yii\helpers\Url::toRoute(['user/add']) ?>"
                       class="btn-flat success pull-right">
                        <span>&#43;</span>
                        新建管理员
                    </a>
                </div>
            </div>
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->beginBlock('script') ?>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/theme.js"></script>
    <script>
        /*
         * 按照登陆名字搜索
         */
        function search() {
            $.ajax({
                url: "<?= \yii\helpers\Url::to(['user/data']) ?>",
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
    </script>
<?php $this->endBlock() ?>