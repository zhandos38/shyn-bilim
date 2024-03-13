<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article_magazine}}`.
 */
class m240313_043100_add_folder_name_column_to_article_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article_magazine', 'folder_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
