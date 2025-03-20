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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_assignment}}');
    }
}
