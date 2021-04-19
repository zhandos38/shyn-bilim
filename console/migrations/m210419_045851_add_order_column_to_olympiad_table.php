<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m210419_045851_add_order_column_to_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%olympiad}}', 'order', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210419_045851_add_order_column_to_olympiad_table can not be reverted";
        return false;
    }
}
