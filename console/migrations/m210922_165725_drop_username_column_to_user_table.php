<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%username_column_to_user}}`.
 */
class m210922_165725_drop_username_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%user}}', 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210922_165725_drop_username_column_to_user_table can not be reverted";
    }
}
