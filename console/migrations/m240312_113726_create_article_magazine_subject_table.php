<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_magazine_subject}}`.
 */
class m240312_113726_create_article_magazine_subject_table extends Migration
{
    public $tableName = '{{%article_magazine_subject}}' ;

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'article_magazine_id' => $this->integer(),
            'subject_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk-article_magazine_id-article_magazine-id', $this->tableName, 'article_magazine_id', 'article_magazine', 'id', 'CASCADE');
        $this->addForeignKey('fk-subject_id-subject-id', $this->tableName, 'subject_id', 'subject', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
