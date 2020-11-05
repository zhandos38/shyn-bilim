<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_subject}}`.
 */
class m201105_171030_create_test_subject_table extends Migration
{
    public $tableName = '{{%test_subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'subject_id' => $this->integer()
        ]);

        $this->addForeignKey('fk-test-subject-test_id-test-id', $this->tableName, 'test_id', 'test', 'id', 'SET NULL');
        $this->addForeignKey('fk-test-subject-subject_id-subject-id', $this->tableName, 'subject_id', 'subject', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
