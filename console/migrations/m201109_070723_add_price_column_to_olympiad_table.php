<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m201109_070723_add_price_column_to_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%olympiad}}', 'price', $this->decimal(10,2)->defaultValue('500')->after('type'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";

        return false;
    }
}
