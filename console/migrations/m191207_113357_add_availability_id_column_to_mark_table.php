<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%mark}}`.
 */
class m191207_113357_add_availability_id_column_to_mark_table extends Migration
{
    public $tableName = '{{%mark}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'availability_id', $this->integer()->after('working_hours'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'availability_id');
    }
}
