<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%email_column_in_user}}`.
 */
class m231023_121150_drop_email_column_in_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%user}}', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "nothing";
    }
}
