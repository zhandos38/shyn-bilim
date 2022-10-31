<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%marathon}}`.
 */
class m221031_172333_add_parent_name_column_to_marathon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("marathon", "parent_name", $this->string()->after("patronymic"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
