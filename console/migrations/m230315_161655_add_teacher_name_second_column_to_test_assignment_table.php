<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m230315_161655_add_teacher_name_second_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("test_assignment", "parent_name_second", $this->string()->after("parent_name"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
