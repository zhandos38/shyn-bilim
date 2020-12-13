<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%assignment}}`.
 */
class m201213_130907_add_leader_name_column_to_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%test_assignment}}', 'leader_name', $this->string()->after('grade'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201213_130907_add_leader_name_column_to_assignment_table_table cannot be reverted.\n";

        return false;
    }
}
