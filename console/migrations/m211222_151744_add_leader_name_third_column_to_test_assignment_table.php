<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m211222_151744_add_leader_name_third_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test_assignment', 'leader_name_third', $this->string()->after('leader_name_second'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "can not be reverted m211222_151744_add_leader_name_third_column_to_test_assignment_table";

        return false;
    }
}
