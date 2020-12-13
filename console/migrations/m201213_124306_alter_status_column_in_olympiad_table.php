<?php

use yii\db\Migration;

/**
 * Class m201213_124306_alter_status_column_in_olympiad_table
 */
class m201213_124306_alter_status_column_in_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%olympiad}}', 'status', $this->tinyInteger(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201213_124306_alter_status_column_in_olympiad_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201213_124306_alter_status_column_in_olympiad_table cannot be reverted.\n";

        return false;
    }
    */
}
