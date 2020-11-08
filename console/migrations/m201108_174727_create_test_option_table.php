<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_option}}`.
 */
class m201108_174727_create_test_option_table extends Migration
{
    public $tableName = '{{%test_option}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'test_id' => $this->integer(),
            'grade' => $this->tinyInteger(3),
            'lang' => $this->string(2)
        ]);

        $this->addForeignKey('fk-test-option-test_id-test-id', $this->tableName, 'test_id', 'test', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-test-option-test_id-test-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
