<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m221013_091342_add_subject_id_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("test_assignment", "subject_id", $this->integer()->after("grade"));

        $this->addForeignKey("fk-test-assignment-subject_id-subject-id", "test_assignment", "subject_id", "subject", "id");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fk-test-assignment-subject_id-subject-id", "test_assignment");
        $this->dropColumn("test_assignment", "subject_id");
    }
}
