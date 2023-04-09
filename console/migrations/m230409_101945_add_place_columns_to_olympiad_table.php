<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m230409_101945_add_place_columns_to_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("olympiad", "third_place_start", $this->integer()->defaultValue(10)->notNull());
        $this->addColumn("olympiad", "third_place_end", $this->integer()->defaultValue(15)->notNull());

        $this->addColumn("olympiad", "second_place_start", $this->integer()->defaultValue(16)->notNull());
        $this->addColumn("olympiad", "second_place_end", $this->integer()->defaultValue(25)->notNull());

        $this->addColumn("olympiad", "first_place_start", $this->integer()->defaultValue(26)->notNull());
        $this->addColumn("olympiad", "first_place_end", $this->integer()->defaultValue(28)->notNull());

        $this->addColumn("olympiad", "grand_place_start", $this->integer()->defaultValue(29)->notNull());
        $this->addColumn("olympiad", "grand_place_end", $this->integer()->defaultValue(30)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
