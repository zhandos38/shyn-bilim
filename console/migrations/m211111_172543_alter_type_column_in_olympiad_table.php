<?php

use yii\db\Migration;

/**
 * Class m211111_172543_alter_type_column_in_olympiad_table
 */
class m211111_172543_alter_type_column_in_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('olympiad', 'type', $this->tinyInteger(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211111_172543_alter_type_column_in_olympiad_table cannot be reverted.\n";

        return false;
    }
}
