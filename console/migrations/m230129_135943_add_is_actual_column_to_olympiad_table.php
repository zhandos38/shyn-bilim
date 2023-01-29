<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m230129_135943_add_is_actual_column_to_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("olympiad", "is_actual", $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
