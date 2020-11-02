<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%name_column_in_test}}`.
 */
class m201102_145651_drop_name_column_in_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%test}}', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";
    }
}
