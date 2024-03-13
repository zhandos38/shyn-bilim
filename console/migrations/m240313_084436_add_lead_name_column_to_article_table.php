<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m240313_084436_add_lead_name_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'lead_name', $this->string()->after('grade'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
