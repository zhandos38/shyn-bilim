<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%mark}}`.
 */
class m191207_120230_add_coordinate_columns_to_mark_table extends Migration
{
    public $tableName = '{{%mark}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'latitude', $this->string()->after('address'));
        $this->addColumn($this->tableName, 'longitude', $this->string()->after('latitude'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'latitude');
        $this->dropColumn($this->tableName, 'longitude');
    }
}
