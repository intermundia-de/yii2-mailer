<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%email_log}}`.
 */
class m191121_151851_create_email_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%email_log}}', [
            'id' => $this->primaryKey(),
            'to' => $this->text(),
            'from' => $this->string(255),
            'cc' => $this->text(),
            'bcc' => $this->text(),
            'message' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
            'subject' => $this->string(2048),
            'status' => $this->string(10)->notNull(),
            'created_at' => $this->integer(),
            'error_message' => $this->text(),
            'trace' => $this->getDb()->getSchema()->createColumnSchemaBuilder('longtext'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%email_log}}');
    }
}
