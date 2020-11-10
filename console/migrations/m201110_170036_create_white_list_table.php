<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%white_list}}`.
 */
class m201110_170036_create_white_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%white_list}}', [
            'id' => $this->primaryKey(),
            'iin' => $this->string(12)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%white_list}}');
    }
}
