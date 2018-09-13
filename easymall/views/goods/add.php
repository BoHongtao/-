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
                                'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                            ],
                            'enableAjaxValidation' => true,
                            'validationUrl' => Url::toRoute('goods/validate')
                        ]); ?>
                        <?= $form->field($goods, 'good_name')->textInput(['placeholder' => '商品名称', 'class' => 'span9']); ?>
                        <?= $form->field($goods, 'good_type')->dropDownList($typeInfo, ['class' => 'span9','prompt' => '--请选择级别--']) ?>
                        <?= $form->field($goods, 'good_key_word')->textInput(['placeholder' => '商品名称关键词', 'class' => 'span9']); ?>
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
