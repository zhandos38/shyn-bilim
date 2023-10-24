<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_category}}`.
 */
class m231019_164639_create_book_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book_category}}');
    }
}
