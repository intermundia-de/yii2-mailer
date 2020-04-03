<?php


namespace intermundia\mailer;


use Yii;
use yii\helpers\Json;
use yii\mail\BaseMessage;
use intermundia\mailer\models\EmailLog;


trait MailerTrait
{

    /**
     * @param $message BaseMessage
     */
    public function sendMessage($message)
    {
        $errorMessage = null;
        $trace = null;
        $exception = null;
        $res = null;
        try {
            $res = parent::sendMessage($message);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $trace = $e->getTraceAsString();
            $exception = $e;
        }

        if ($this->saveToDatabase == true) {
            $emailLog = new EmailLog();

            $emailLog->cc = $message->getCc() ? Json::encode($message->getCc(), true) : null;
            $emailLog->to = Json::encode($message->getTo(), true);
            $emailLog->from = Json::encode($message->getFrom(), true);
            $emailLog->bcc = $message->getBcc() ? Json::encode($message->getBcc(), true) : null;
            $emailLog->subject = $message->getSubject();
            $emailLog->status = $res ? EmailLog::STATUS_SENT : EmailLog::STATUS_FAILED;
            $emailLog->message = $message->toString();
            $emailLog->created_at = time();
            $emailLog->ip_address = preg_replace('/((\d+\.)+)\d+/', '$1*', Yii::$app->request->getUserIP());
            if ($errorMessage) {
                $emailLog->error_message = $errorMessage;
                $emailLog->trace = $trace;
            }


            if (!$emailLog->save()) {
                Yii::error($emailLog->errors);
            }

        }

        if ($exception) {
            throw $exception;
        }

        return $res;
    }
}