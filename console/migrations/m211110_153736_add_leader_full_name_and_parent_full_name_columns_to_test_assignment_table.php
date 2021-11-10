<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m211110_153736_add_leader_full_name_and_parent_full_name_columns_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test_assignment', 'parent_name', $this->string()->after('leader_name_second'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211110_153736_add_leader_full_name_and_parent_full_name_columns_to_test_assignment_table can not be reverted";
    }
}
