<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%author_column_in_project_article}}`.
 */
class m200622_183801_drop_author_column_in_project_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%project_article}}', 'author');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo 'This migration can not be reverted';
    }
}
