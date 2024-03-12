<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m240311_141730_add_magazine_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'magazine', $this->string()->notNull()->defaultValue("BILIMSHINI"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
