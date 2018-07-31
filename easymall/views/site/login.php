<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/7/30
 * Time: 16:54
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="row-fluid login-wrapper">
    <a class="brand" href="index.html"></a>
    <div class="span4 box">
        <div class="content-wrap">
            <h6>EasyMall - 后台管理</h6>
            <?php
            $form = ActiveForm::begin([
                'id' => 'login_form',
            ]);
            ?>
            <?= $form->field($model, 'userName')->textInput(['placeholder' => "管理员账号", 'class' => "span12"]) ?>
            <?= $form->field($model, 'password')->textInput(['placeholder' => "管理员密码", 'class' => "span12"]) ?>
            <span class="block input-icon input-icon-right">
                <?= $form->field($model, 'code')->widget(yii\captcha\Captcha::className(), [
                    'captchaAction' => 'site/captcha',
                    'template' => '<div class="row"><div class="col-xs-6">{input}</div><div class="col-xs-6 codeimg">{image}</div></div>',
                    'imageOptions' => ['alt' => '点击换图', 'title' => '点击换图'],
                    'options' => [
                        'placeholder' => 'Captcha',
                        'class' => 'form-control',
                    ]
                ]); ?>
            </span>
            <a href="#" class="forgot">忘记密码?</a>
            <div class="remember">
                <input id="remember-me" type="checkbox"/>
                <label for="remember-me">记住我</label>
            </div>
            <?= Html::submitButton('<i class="icon-key"></i> 登 录', ['class' => 'btn-glow primary login', 'name' => 'login-button']) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
    <div class="span4 no-account">
        <p>没有账户?</p>
        <a href="signup.html">注册</a>
    </div>
</div>