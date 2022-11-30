<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_assignment}}`.
 */
class m221130_162757_create_test_assignment_table extends Migration
{
    public $tableName = '{{%test_assignment}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'olympiad_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'patronymic' => $this->string()->notNull(),
            'iin' => $this->string(12)->notNull(),
            'phone' => $this->string(12),
            'school_id' => $this->integer(),
            'grade' => $this->integer(2)->notNull(),
            'lang' => $this->string(2),
            'point' => $this->integer(),
            'teacher_name' => $this->string(),
            'parent_name' => $this->string(),
            'status' => $this->integer()->defaultValue(0)->notNull(),
            'created_at' => $this->integer(),
            'finished_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-test-assignment-subject_id-subject-id', $this->tableName, 'subject_id', '{{%subject}}', 'id', 'SET NULL');
        $this->addForeignKey('fk-test-assignment-olympiad_id-olympiad-id', $this->tableName, 'olympiad_id', '{{%olympiad}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('fk-test-assignment-test_id-test-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
