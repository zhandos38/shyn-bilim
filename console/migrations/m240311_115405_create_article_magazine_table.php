<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_magazine}}`.
 */
class m240311_115405_create_article_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_magazine', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'img' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_magazine}}');
    }
}
