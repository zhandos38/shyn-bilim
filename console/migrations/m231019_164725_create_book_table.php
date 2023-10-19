<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m231019_164725_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'file' => $this->string()->notNull(),
            'img' => $this->string()->notNull(),
            'age_range' => $this->string(),
            'book_category_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
