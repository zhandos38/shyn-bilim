<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m220822_162652_add_phone_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'phone', $this->string()->notNull()->after('iin'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
