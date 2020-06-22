<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_article}}`.
 */
class m200622_173745_create_project_article_table extends Migration
{
    public $tableName = '{{%project_article}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'author' => $this->string()->notNull(),
            'topic' => $this->string()->notNull(),
            'file' => $this->string(),
            'project_id' => $this->integer(),
            'created_at' => $this->integer()
        ]);

        $this->addForeignKey('fk-article-topic-project_id-project-id', $this->tableName, 'project_id', 'project', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-article-topic-project_id-project-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
