<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m221016_012739_add_phone_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("test_assignment", "phone", $this->string(20)->after("parent_name"));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
