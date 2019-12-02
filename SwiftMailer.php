<?php


namespace intermundia\mailer;

use yii\swiftmailer\Mailer;

class SwiftMailer extends Mailer
{

    public $saveToDatabase = true;

    use MailerTrait;

}