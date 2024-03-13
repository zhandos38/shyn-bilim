<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article_magazine}}`.
 */
class m240313_053157_add_is_charter_landscape_column_to_article_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article_magazine', 'is_charter_landscape', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
