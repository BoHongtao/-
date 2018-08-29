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
                <h3>添加新的类型</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = ActiveForm::begin([
                            'id' => 'add-type',
                            'options' => [
                                'class' => 'new_user_form inline-input'
                            ],
                            'fieldConfig' => [
                                'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                            ],
                            'enableAjaxValidation' => true,
                            'validationUrl' => Url::toRoute('good-type/validate')
                        ]); ?>
                    </div>
                </div>
                <?= $form->field($type, 'type')->textInput(['placeholder' => '类型名称', 'class' => 'span9']); ?>
                <?= $form->field($type, 'order')->dropDownList(['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4'], ['class' => 'span9']) ?>

                <?= $form->field($type, 'file')->fileInput(); ?>

                <?= $form->field($type, 'logo')->dropDownList(['0' => '速冻食品', '1' => '新鲜蔬菜', '2' => '禽类蛋品', '3' => '猪牛羊肉', '4' => '海鲜水产' ,'5' => '新鲜水果'], ['class' => 'span9']) ?>

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
    $(document).on("beforeSubmit", "#add-type", function () {
        $('#manager-add-btn').html('提交中');
        $('#manager-add-btn').attr('disabled', true);
        $('#manager-cancle-btn').attr('disabled', true);

        $('#add-type').ajaxSubmit({
            url: $('#add-type').attr('action'),
            type: 'post',
            data: $('#add-type').serialize(),
            success: function (data) {
                if (data.code == 200) {
                    layer.msg('添加成功');
                    setTimeout('window.location.href="<?= Url::toRoute(['good-type/index']) ?>"', 1500);
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
