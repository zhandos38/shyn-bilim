<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 */
class m200618_163442_create_test_table extends Migration
{
    public $tableName = '{{%test}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'subject_id' => $this->integer(),
            'grade' => $this->smallInteger(2),
            'questions_limit' => $this->integer()->defaultValue(40),
            'time_limit' => $this->integer()->defaultValue(60),
            'lang' => $this->string(2),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-test-subject_id-subject-id', $this->tableName, 'subject_id', '{{%subject}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-test-subject_id-subject-id', $this->tableName);

        $this->dropTable($this->tableName);
    }
}
