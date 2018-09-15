<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/10
 * Time: 21:17
 */
use yii\helpers\Url;
?>
<link rel="stylesheet" href="static/layer/css/carousel.css">
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>商品列表</h3>
            </div>
            <!-- Users table -->
            <div id="unseen">
                <?php echo $this->context->actionData(); ?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>

<?php $this->beginBlock('script'); ?>
<script>
    var ue = UE.getEditor('good_desc',{toolbars: [[
        'bold', 'italic', 'underline', 'fontborder', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'imagenone', 'imageleft', 'imageright', 'imagecenter', '|', 'emotion'
    ]]});
</script>
<?php $this->endBlock(); ?>
