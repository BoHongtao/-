<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/9
 * Time: 14:25
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<link rel="stylesheet" type="text/css" href="static/css/lib/font-awesome.css"/>
<link rel="stylesheet" href="static/css/compiled/new-user.css" type="text/css" media="screen"/>
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新的供货商</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php if($supplier_id==''){
                            $form = ActiveForm::begin([
                                'id' => 'change-supplier',
                                'options' => [
                                    'class' => 'new_user_form inline-input'
                                ],
                                'fieldConfig' => [
                                    'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                                ],
                                'enableAjaxValidation' => true,
                                'validationUrl' => Url::toRoute('supplier/validate')
                            ]);
                        }else{
                            $form = ActiveForm::begin([
                                'id' => 'change-supplier',
                                'options' => [
                                    'class' => 'new_user_form inline-input'
                                ],
                                'fieldConfig' => [
                                    'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                                ],
                                'enableAjaxValidation' => true,
                                'validationUrl' => Url::toRoute(['supplier/validate','supplier_id'=>$supplier_id])
                            ]);
                        }
                        ?>
                    </div>
                </div>
                <?= $form->field($model, 'supplier_name')->textInput(['placeholder' => '供货商名称', 'class' => 'span9']); ?>
                <?= $form->field($model, 'link_name')->textInput(['placeholder' => '联系人', 'class' => 'span9']); ?>
                <?= $form->field($model, 'link_tel')->textInput(['placeholder' => '联系人电话', 'class' => 'span9']); ?>
                <?= $form->field($model, 'link_address')->textInput(['placeholder' => '联系人地址', 'class' => 'span9']); ?>
                <?= $form->field($model, 'desc')->textarea(['placeholder' => '描述', 'class' => 'span9']); ?>
                <div class="span11 field-box actions">
                    <?= Html::submitButton('创建', ['class' => 'btn-glow primary', 'name' => 'submit-button', 'id' => 'manager-add-btn']) ?>
                    <span>OR</span>
                    <?= Html::button('取消', ['class' => 'reset', 'style' => 'margin-left:5px', 'id' => 'manager-cancle-btn', 'onclick' => 'history.go(-1)']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->beginBlock('script'); ?>
<script>
    /*
     * 初始化layer
     */
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    /*
     * ajax提交
     */
    $(document).on("beforeSubmit", "#change-supplier", function () {
        $('#manager-add-btn').html('提交中');
        $('#manager-add-btn').attr('disabled', true);
        $('#manager-cancle-btn').attr('disabled', true);

        $('#change-supplier').ajaxSubmit({
            url: $('#change-supplier').attr('action'),
            type: 'post',
            data: $('#change-supplier').serialize(),
            success: function (data) {
                if (data.code == 200) {
                    layer.msg('变更成功');
                    setTimeout('window.location.href="<?= Url::toRoute(['supplier/index']) ?>"', 1500);
                } else {
                    layer.msg('变更失败');
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
