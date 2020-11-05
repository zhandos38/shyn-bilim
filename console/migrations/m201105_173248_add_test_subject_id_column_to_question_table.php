<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%question}}`.
 */
class m201105_173248_add_test_subject_id_column_to_question_table extends Migration
{
    public $tableName = '{{%question}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'test_subject_id', $this->integer()->after('id'));
        $this->addForeignKey('fk-question-test_subject_id-test-subject-id', $this->tableName, 'test_subject_id', 'test_subject', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";

        return false;
    }
}
