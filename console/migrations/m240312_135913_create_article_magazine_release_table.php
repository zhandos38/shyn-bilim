<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_magazine_release}}`.
 */
class m240312_135913_create_article_magazine_release_table extends Migration
{
    public $tableName = '{{%article_magazine_release}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'article_magazine_id' => $this->integer(),
            'name' => $this->string(),
            'img' => $this->string(),
            'file' => $this->string()
        ]);

        $this->addForeignKey('fk-article_magazine_release-article_magazine-id', $this->tableName, 'article_magazine_id', 'article_magazine', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
