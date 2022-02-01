<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_white_list}}`.
 */
class m220201_083439_create_article_white_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_white_list}}', [
            'id' => $this->primaryKey(),
            'iin' => $this->string(),
            'limit' => $this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_white_list}}');
    }
}
