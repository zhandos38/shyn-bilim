<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m221124_165002_add_phone_student_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("test_assignment", "phone_student", $this->string()->after("phone"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
