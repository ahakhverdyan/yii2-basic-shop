<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<div class="banner">
    <?= $this->render('//layouts/inc/sidebar'); ?>
    <div class="w3l_banner_nav_right" style="padding: 0 1em">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

