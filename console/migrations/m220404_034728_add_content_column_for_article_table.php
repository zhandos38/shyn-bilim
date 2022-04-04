<?php

use yii\db\Migration;

/**
 * Class m220404_034728_add_content_column_for_article_table
 */
class m220404_034728_add_content_column_for_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("article", 'content', $this->text()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220404_034728_add_content_column_for_article_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220404_034728_add_content_column_for_article_table cannot be reverted.\n";

        return false;
    }
    */
}
