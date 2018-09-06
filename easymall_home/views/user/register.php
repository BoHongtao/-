<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 2018/8/24
 * Time: 10:20
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<div class="register_con">
    <div class="l_con fl">
        <a class="reg_logo"><img src="static/images/logo02.png"></a>
        <div class="reg_slogan">足不出户  ·  新鲜每一天</div>
        <div class="reg_banner"></div>
    </div>
    <div class="r_con fr">
        <div class="reg_title clearfix">
            <h1>用户注册</h1>
            <a href="<?= Url::to(['user/login'])?>">登录</a>
        </div>
        <div class="reg_form clearfix">
            <?php $form = ActiveForm::begin(); ?>
                <ul>
                    <li><?= $form->field($model, 'username')->textInput(['id'=>'user_name'])?></li>
                    <li><?= $form->field($model, 'userpwd')->passwordInput(['id'=>'pwd'])?></li>
                    <li><?= $form->field($model, 'repwd')->passwordInput(['id'=>'cpwd'])?></li>
                    <li><?= $form->field($model, 'phone')->textInput()?></li>
                    <li class="agreement">
                        <input type="checkbox" name="allow" id="allow" checked="checked">
                        <label>同意”天天生鲜用户使用协议“</label>
                        <span class="error_tip2">提示信息</span>
                    </li>
                    <li class="reg_sub">
                        <input type="submit" value="注 册" name="">
                    </li>
                </ul>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
