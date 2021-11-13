<?php

use yii\db\Migration;

/**
 * Class m211111_172519_alter_type_column_in_olympiad_table
 */
class m211111_172519_alter_type_column_in_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211111_172519_alter_type_column_in_olympiad_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211111_172519_alter_type_column_in_olympiad_table cannot be reverted.\n";

        return false;
    }
    */
}
