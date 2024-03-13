<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article_magazine}}`.
 */
class m240313_052221_add_is_cert_landscape_column_to_article_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article_magazine', 'is_cert_landscape', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
