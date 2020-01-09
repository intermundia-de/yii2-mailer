<?php

namespace intermundia\mailer\models;

use Yii;

/**
 * This is the model class for table "email_log".
 *
 * @property int $id
 * @property string|null $to
 * @property string|null $from
 * @property string|null $cc
 * @property string|null $bcc
 * @property string|null $message
 * @property string|null $subject
 * @property string|null $status
 * @property int|null $created_at
 * @property string|null $error_message
 * @property string|null $trace
 */
class EmailLog extends \yii\db\ActiveRecord
{

    const STATUS_SENT = 'sent';
    const STATUS_FAILED = 'failed';

    public $deleteDate;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%email_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message', 'error_message', 'trace'], 'string'],
            [['created_at'], 'integer'],
            [['deleteDate'], 'string'],
            [['subject'], 'string', 'max' => 2048],
            [['to', 'from', 'cc', 'bcc'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii2-mailer', 'ID'),
            'to' => Yii::t('yii2-mailer', 'To'),
            'from' => Yii::t('yii2-mailer', 'From'),
            'cc' => Yii::t('yii2-mailer', 'Cc'),
            'bcc' => Yii::t('yii2-mailer', 'Bcc'),
            'message' => Yii::t('yii2-mailer', 'Message'),
            'status' => Yii::t('yii2-mailer', 'Status'),
            'subject' => Yii::t('yii2-mailer', 'Subject'),
            'created_at' => Yii::t('yii2-mailer', 'Created At'),
            'error_message' => Yii::t('yii2-mailer', 'Error Message'),
            'trace' => Yii::t('yii2-mailer', 'Trace'),
        ];
    }

    public static function statuses()
    {
        return [
            self::STATUS_SENT => Yii::t('yii2-mailer', 'Sent'),
            self::STATUS_FAILED => Yii::t('yii2-mailer', 'Failed')
        ];
    }
}
