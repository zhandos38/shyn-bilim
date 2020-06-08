<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%magazine}}`.
 */
class m200608_163029_create_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%magazine}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer()->notNull(),
            'image' => $this->string()->notNull(),
            'file' => $this->string()->notNull(),
            'created_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%magazine}}');
    }
}
