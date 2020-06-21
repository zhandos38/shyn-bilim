<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_assignment}}`.
 */
class m200618_163858_create_test_assignment_table extends Migration
{
    public $tableName = '{{%test_assignment}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'iin' => $this->string(12)->notNull(),
            'school_id' => $this->integer(),
            'grade' => $this->integer(2)->notNull(),
            'point' => $this->integer(),
            'created_at' => $this->integer(),
            'finished_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-test-assignment-test_id-test-id', $this->tableName, 'test_id', 'test', 'id', 'SET NULL');
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
