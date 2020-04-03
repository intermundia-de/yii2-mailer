<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%email_log}}`.
 */
class m200403_104856_add_ip_address_column_to_email_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%email_log}}', 'ip_address', $this->string(55)->after('created_at'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%email_log}}', 'ip_address');
    }
}
