<?php


namespace intermundia\mailer\assets;


use common\assets\Html5shiv;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class MailerAsset extends AssetBundle
{

    public $sourcePath = __DIR__ . '/../web';

    public $css = [
        'styles.css'
    ];

    public $depends = [
        YiiAsset::class,
        Html5shiv::class,
    ];

}