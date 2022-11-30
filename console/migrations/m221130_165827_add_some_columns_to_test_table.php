<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test}}`.
 */
class m221130_165827_add_some_columns_to_test_table extends Migration
{
    public $tableName = '{{%test}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'grade_from', $this->smallInteger(2));
        $this->addColumn($this->tableName, 'grade_to', $this->smallInteger(2));
        $this->addColumn($this->tableName, 'level', $this->integer(2)->notNull());
        $this->addColumn($this->tableName, 'lang', $this->string(2)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
