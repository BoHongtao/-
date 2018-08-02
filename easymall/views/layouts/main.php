<?php
use yii\helpers\Html;
use app\assets\AppAsset;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon">
        <title>EasyMall</title>
        <?php $this->head() ?>
        <?php if(isset($this->blocks['head'])) echo $this->blocks['head']?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php echo $this->render('_header') ?>
    <div class="main-container" id="main-container">
        <div class="main-container-inner">
            <?php echo $this->render('_left') ?>
            <section id="main-content">
                <section class="wrapper">
                    <?php echo $content; ?>
                </section>
            </section>
        </div>
    </div>
    <?php $this->endBody() ?>
    <?php if(isset($this->blocks['script'])) echo $this->blocks['script']?>
    </body>
    </html>
<?php $this->endPage() ?>