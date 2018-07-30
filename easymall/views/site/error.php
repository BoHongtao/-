<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

//$this->title = $name;
?>
<div class="main-content">
    <div class="page-content">
        <div class="site-error">
            <h2><?=$name?></h2>
            <div class="alert alert-danger">
                <?=$message;?>
            </div>
        </div>
    </div>
</div>
