<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m210218_150654_add_leader_name_second_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%test_assignment}}', 'leader_name_second', $this->string()->after('leader_name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210218_150654_add_leader_name_second_column_to_test_assignment_table cannot be reverted.\n";

        return false;
    }
}
