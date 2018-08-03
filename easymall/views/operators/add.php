<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<link rel="stylesheet" type="text/css" href="static/css/lib/font-awesome.css" />
<link rel="stylesheet" href="static/css/compiled/new-user.css" type="text/css" media="screen" />

<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新的管理员</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = ActiveForm::begin([
                            'id' => 'add_manager_form',
                            'options' => [
                                'class' => 'new_user_form inline-input'
                            ],
                            'fieldConfig' => [
                                'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                            ],
                            'enableAjaxValidation' => true,
                            'validationUrl' => Url::toRoute('operators/validate')
                        ]); ?>
                        <?= $form->field($model,'operator_name')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model,'password')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model, 'role_id')->dropDownList($roles,['prompt' => '----请选择角色----']) ?>
                        <?= $form->field($model,'true_name')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model,'email')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model,'contact_phone')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model,'wechat')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model,'company')->textInput(['class' => 'span9']) ?>
                        <?= $form->field($model,'file')->fileInput(['class' => 'span9']) ?>
                        <div class="span11 field-box actions">
                            <?= Html::submitButton('Create user', ['class' => 'btn-glow primary','name'=>'submit-button','id' => 'manager-add-btn']) ?>
                            <span>OR</span>
                            <?= Html::button('取消', ['class' => 'reset', 'style' => 'margin-left:5px', 'id' => 'manager-cancle-btn', 'onclick' => 'history.go(-1)']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        添加管理员请务必保证是可信赖的人员，否则可能会导致平台安全性降低
                    </div>
                    <h6>添加管理员注意事项:</h6>
                    <p>尽可能使用复杂密码</p>
                    <p>密码切勿外泄</p>
                    <p>建议复制使用密码生成器生成密码:</p>
                    <p>
                        <div style="border: 2px dashed black;line-height: 20px;height: 20px;text-align:center;width: 140px;display: inline-block" id="random_password"></div>
                        <button class="btn" data-clipboard-action="copy" data-clipboard-target="#random_password" style="margin-left: 8px;">复制</button>
                    </p>
                    <p onclick="generate_again()">点击重新生成</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->beginBlock('script'); ?>
<script src="static/js/clipboard.min.js"></script>
<script>
    /*
     *  随机产生密码
     *  @param   size   int  生成密码的长度
     */
    function randomPassword(size) {
        var seed = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','P','Q','R','S','T','U','V','W','X','Y','Z', 'a','b','c','d','e','f','g','h','i','j','k','m','n','p','Q','r','s','t','u','v','w','x','y','z', '2','3','4','5','6','7','8','9','$','!','@','#','*');
        seedlenth = seed.length;
        var createPassword = '';
        for (i = 0 ; i < size; ++ i){
            j = Math.floor(Math.random()*seedlenth);
            createPassword += seed[j];
        }
        return createPassword;
    }
    /*
     *  改变div里面的密码
     */
    function generate_again() {
        $('#random_password').text(randomPassword(8))
    }
    /*
     *  打开页面初始化密码
     */
    $(function () {
        generate_again()
    });
    /*
     *  一键复制密码
     */
    var clipboard = new ClipboardJS('.btn');
    clipboard.on('success', function(e) {
        console.log(e);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
    /*
     * 初始化layer
     */
    layui.use('layer', function(){
        var layer = layui.layer;
    });

    /*
     * ajax提交
     */
    $(document).on("beforeSubmit", "#add_manager_form", function () {
        $('#manager-add-btn').html('提交中');
        $('#manager-add-btn').attr('disabled', true);
        $('#manager-cancle-btn').attr('disabled', true);

        $('#add_manager_form').ajaxSubmit({
            url: $('#add_manager_form').attr('action'),
            type: 'post',
            data: $('#add_manager_form').serialize(),
            success: function (data) {
                if (data.code == 200) {
                    layer.msg('添加成功');
                    setTimeout('window.location.href="<?= Url::toRoute(['operators/index']) ?>"', 1500);
                } else {
                    layer.msg('添加失败');
                    $('#manager-add-btn').html('确定');
                    $('#manager-add-btn').attr('disabled', false);
                    $('#manager-cancle-btn').attr('disabled', false);
                }
            }
        });
        return false;
    });

</script>
<?php $this->endBlock(); ?>
