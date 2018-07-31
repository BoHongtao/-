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
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "管理员密码", 'class' => "span12"]) ?>
            <?= $form->field($model, 'code')->widget(yii\captcha\Captcha::className(), [
                'captchaAction' => 'site/captcha',
                'template' => '<div style="height: 60px"><div><input type="text" id="loginverity-code" style="width: 160px;height: 34px;float: left" name="LoginVerity[code]" placeholder="Captcha"></div><div style="float: right">{image}</div></div>',
                'imageOptions' => ['alt' => '点击换图', 'title' => '点击换图'],
                'options' => [
                    'placeholder' => 'Captcha',
                    'class' => 'form-control',
                ]
            ]); ?>
            <a href="#" class="forgot">忘记密码?</a>
            <div class="remember">
                <input id="remember-me" type="checkbox"/>
                <label for="remember-me">记住我</label>
            </div>
            <?= Html::submitButton('<i class="icon-key"></i> 登 录', ['class' => 'btn-glow primary login', 'name' => 'login-button']) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>