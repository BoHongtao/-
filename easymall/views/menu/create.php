<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<link rel="stylesheet" type="text/css" href="static/css/lib/font-awesome.css"/>
<link rel="stylesheet" href="static/css/compiled/new-user.css" type="text/css" media="screen"/>

<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新的权限</h3>
            </div>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">

                        <?php $form = ActiveForm::begin([
                            'id' => 'add-region',

                            'options' => [
                                'class' => 'new_user_form inline-input'
                            ],
                            'fieldConfig' => [
                                'template' => "<div class='span12 field-box'>{label}{input}{error}</div> <div>{hint}</div>",
                            ],
                        ]) ?>
                        <?= $form->field($model, 'name')->textInput(['class'=>'span9']) ?>

                        <?= $form->field($model, 'pid')->dropDownList($menuArr,['class'=>'span9']) ?>

                        <?= $form->field($model, 'act')->textInput(['class'=>'span9']) ?>

                        <?= $form->field($model, 'route')->textInput(['class'=>'span9']) ?>

                        <?= $form->field($model, 'attr')->textInput(['class'=>'span9'])->label('当前控制器名称') ?>

                        <?= $form->field($model, 'icon')->textInput(['class'=>'span9'])->label('显示图标的路径') ?>

                        <?= $form->field($model, 'sort')->textInput(['class'=>'span9'])->label('排序') ?>

                        <?= $form->field($model, 'display')->radioList(['2' => '显示', '1' => '隐藏'])->label('显示') ?>


                        <div class="span11 field-box actions">
                            <?= Html::submitButton('确认', ['class' => 'btn-glow primary','name'=>'submit-button','id' => 'manager-add-btn']) ?>
                            <span>OR</span>
                            <?= Html::button('取消', ['class' => 'reset', 'style' => 'margin-left:5px', 'id' => 'manager-cancle-btn', 'onclick' => 'history.go(-1)']) ?>
                        </div>



                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <!-- side right column -->
            </div>
        </div>
    </div>
</div>
