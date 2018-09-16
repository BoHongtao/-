<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/9/12
 * Time: 16:59
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>

<link rel="stylesheet" href="static/css/compiled/new-user.css" type="text/css" media="screen" />

<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>发布商品</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = ActiveForm::begin([
                            'id' => 'add_goods',
                            'options' => [
                                'class' => 'new_user_form inline-input'
                            ],
                            'fieldConfig' => [
                                'template' => "<div class='span12 field-box'>{label}{input}{error}</div>",
                                'labelOptions' => [
                                    'class' => 'col-xs-2 control-label'
                                ]
                            ],
                            'enableAjaxValidation' => true,
                            'validationUrl' => Url::toRoute('goods/validate')
                        ]); ?>
                        <?= $form->field($goods, 'good_name')->textInput(['placeholder' => '商品名称', 'class' => 'span9']); ?>
                        <?= $form->field($goods, 'good_type')->dropDownList($typeInfo, ['class' => 'span9','prompt' => '--请选择级别--']) ?>
                        <?= $form->field($goods, 'good_type')->dropDownList($supplierInfo, ['class' => 'span9','prompt' => '--请选择供应商--']) ?>
                        <?= $form->field($goods, 'good_key_word')->textInput(['placeholder' => '商品名称关键词,用于SEO搜索', 'class' => 'span9']); ?>
                        <b>商品描述</b>
                        <?= $form->field($goods, 'good_desc')->widget('common\widgets\ueditor\Ueditor', [
                            'options'=>[
                                'initialFrameWidth' => 850,
                                'placeholder' => '商品描述',
                                'id'=>'good_desc',
//                                'toolbars'=> [[
//                                    'bold', 'italic', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
//                                    'rowspacingtop', '|',
//                                    'customstyle', 'paragraph', 'fontfamily', 'fontsize',
//                                    'directionalityltr', 'directionalityrtl', 'indent', '|',
//                                    'imagenone', 'imageleft', 'imageright', 'imagecenter', '|', 'emotion'
//                                ]]
                            ],
                        ]) ?>
                        <?= $form->field($goods, 'price_market')->textInput(['placeholer' => '市场价格'])  ?>
                        <?= $form->field($goods, 'price_sale')->textInput(['placeholer' => '销售价格'])  ?>
                        <?= $form->field($goods, 'price_cost')->textInput(['placeholer' => '成本价格'])  ?>
                        <?= $form->field($goods, 'count_sale')->textInput(['placeholer' => '基础销量'])  ?>
                        <?= $form->field($goods, 'count_total')->textInput(['placeholer' => '总库存'])  ?>
                        <?= $form->field($goods, 'count_warning')->textInput(['placeholer' => '库存预警'])  ?>
                        <?= $form->field($goods, 'is_sale')->inline()->radioList(["隐藏","显示"]) ?>
                        <?= $form->field($goods, 'good_label')->textInput(['placeholer' => '标签值'])?>
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
                </div>
            </div>
        </div>
    </div>
</div>
