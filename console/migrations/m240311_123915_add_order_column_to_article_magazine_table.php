<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article_magazine}}`.
 */
class m240311_123915_add_order_column_to_article_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article_magazine', 'order', $this->integer()->defaultValue(10));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
