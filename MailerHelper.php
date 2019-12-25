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
        $from = strtotime("-$days days");
        $to = time();

        $deleteLog = EmailLog::deleteAll(['AND', ['<=', 'created_at', $to], ['>=', 'created_at', $from]]);

        if (!$deleteLog) {
            Console::output('Error while deleting');
        } else {
            Console::output('Successfully deleted');
        }
    }

}