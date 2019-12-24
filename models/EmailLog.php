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
            'id' => Yii::t('app', 'ID'),
            'to' => Yii::t('app', 'To'),
            'from' => Yii::t('app', 'From'),
            'cc' => Yii::t('app', 'Cc'),
            'bcc' => Yii::t('app', 'Bcc'),
            'message' => Yii::t('app', 'Message'),
            'status' => Yii::t('app', 'Status'),
            'subject' => Yii::t('app', 'Subject'),
            'created_at' => Yii::t('app', 'Created At'),
            'error_message' => Yii::t('app', 'Error Message'),
            'trace' => Yii::t('app', 'Trace'),
        ];
    }

    public static function statuses()
    {
        return [
            self::STATUS_SENT => Yii::t('common', 'Sent'),
            self::STATUS_FAILED => Yii::t('common', 'Failed')
        ];
    }
}
