<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%marathon}}`.
 */
class m211027_094058_add_created_at_column_to_marathon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('marathon', 'created_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211027_094058_add_created_at_column_to_marathon_table can not be reverted";
        return false;
    }
}
