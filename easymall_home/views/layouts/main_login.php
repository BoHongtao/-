<?php
use yii\helpers\Html;
use app\assets\AppAssetLogin;
AppAssetLogin::register($this);
?>

<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html class="login-bg">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Yii::$app->params['title']?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
            <?php echo $content; ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php if(isset($this->blocks['script'])) echo $this->blocks['script']?>
<?php $this->endPage() ?>
