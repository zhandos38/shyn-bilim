<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article_magazine}}`.
 */
class m240313_080145_add_type_column_to_article_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article_magazine', 'type', $this->string(7)->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
