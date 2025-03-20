<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_assignment}}`.
 */
class m250320_175817_create_book_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_assignment}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'patronymic' => $this->string()->null(),
            'iin' => $this->string(),
            'school_id' => $this->integer(),
            'grade' => $this->integer(),
            'leader_name' => $this->string(),
            'leader_phone' => $this->string(),
            'parent_name' => $this->string()->null(),
            'parent_phone' => $this->string()->null(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-book_assignment-school_id', '{{%book_assignment}}', 'school_id', 'school', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_assignment}}');
    }
}
