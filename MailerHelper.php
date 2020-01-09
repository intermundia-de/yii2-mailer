<?php


namespace intermundia\mailer;


use intermundia\mailer\models\EmailLog;
use yii\helpers\Console;

class MailerHelper
{

    /**
     * @param $days
     */
    public static function deleteLog($days)
    {
        $deleteLog = EmailLog::deleteAll(['<', 'created_at', strtotime("-$days days")]);
        Console::output(\Yii::t('yii2-mailer',"Successfully deleted {number} records",['number' => $deleteLog]));
    }

}