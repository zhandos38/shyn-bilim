<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m221203_103749_add_teacher_type_name_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test_assignment', 'teacher_type_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
