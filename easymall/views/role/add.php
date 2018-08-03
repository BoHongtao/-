<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/3
 * Time: 15:59
 */
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
                <h3>添加新的角色</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = ActiveForm::begin([
                            'id' => 'add-role',
                            'options' => [
                                'class' => 'new_user_form inline-input'
                            ],
                            'fieldConfig' => [
                                'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                            ],
                            'enableAjaxValidation' => true,
                            'validationUrl' => Url::toRoute('role/validate-add')
                        ]); ?>
                    </div>
                </div>
                <?= $form->field($model, 'name')->textInput(['placeholder' => '角色名','class' => 'span9']); ?>
                <?= $form->field($model, 'description')->textArea(['rows' => '3','class' => 'span9']) ?>
                <div class="span11 field-box actions">
                    <?= Html::submitButton('Create user', ['class' => 'btn-glow primary','name'=>'submit-button','id' => 'manager-add-btn']) ?>
                    <span>OR</span>
                    <?= Html::button('取消', ['class' => 'reset', 'style' => 'margin-left:5px', 'id' => 'manager-cancle-btn', 'onclick' => 'history.go(-1)']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->beginBlock('script') ?>
<script type="text/javascript">
    /*
     * 初始化layer
     */
    layui.use('layer', function(){
        var layer = layui.layer;
    });

    /*
     * 表单提交
     */
    $(document).on("beforeSubmit", "#add-role", function () {
        $('#add-role').ajaxSubmit({
            url: $('#add-role').attr('action'),
            type: 'post',
            data: $('#add-role').serialize(),
            success: function (data) {
                if (data.code == 200) {
                    layer.msg('添加成功');
                    setTimeout('window.location.href="<?= Url::toRoute(['role/index']) ?>"', 1500);
                } else {
                    layer.msg('添加失败');
                    $('#manager-add-btn').html('确定');
                    $('#manager-add-btn').attr('disabled', false);
                    $('#manager-cancle-btn').attr('disabled', false);
                }
            }
        });
        return false; // Cancel form submitting.
    });
</script>
<?php $this->endBlock()?>