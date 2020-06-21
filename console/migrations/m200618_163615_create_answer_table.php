<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answer}}`.
 */
class m200618_163615_create_answer_table extends Migration
{
    public $tableName = '{{%answer}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer(),
            'text' => $this->text(),
            'is_right' => $this->boolean(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-answer-question_id-question-id', $this->tableName, 'question_id', '{{%question}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
