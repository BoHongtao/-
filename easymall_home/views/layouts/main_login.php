<?php
use yii\helpers\Html;
use app\assets\AppAssetLogin;
AppAssetLogin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon">
    <title>天天生鲜</title>
    <?php $this->head() ?>
    <?php if(isset($this->blocks['head'])) echo $this->blocks['head']?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="main-container" id="main-container">
    <div class="main-container-inner">
        <section id="main-content">
            <section class="wrapper">
                <?php echo $content; ?>
            </section>
        </section>
    </div>
</div>
<?php echo $this->render('_footer') ?>
<?php $this->endBody() ?>
<?php if(isset($this->blocks['script'])) echo $this->blocks['script']?>
</body>
</html>
<?php $this->endPage() ?>
