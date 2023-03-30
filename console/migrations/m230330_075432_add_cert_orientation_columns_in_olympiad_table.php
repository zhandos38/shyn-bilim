<?php

use yii\db\Migration;

/**
 * Class m230330_075432_add_cert_orientation_columns_in_olympiad_table
 */
class m230330_075432_add_cert_orientation_columns_in_olympiad_table extends Migration
{
    public $tableName = 'olympiad';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'is_landscape_diploma_orientation', $this->boolean()->defaultValue(false));
        $this->addColumn($this->tableName, 'is_landscape_cert_orientation', $this->boolean()->defaultValue(false));
        $this->addColumn($this->tableName, 'is_landscape_cert_thank_leader_orientation', $this->boolean()->defaultValue(false));
        $this->addColumn($this->tableName, 'is_landscape_cert_thank_parent_orientation', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230330_075432_add_cert_orientation_columns_in_olympiad_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230330_075432_add_cert_orientation_columns_in_olympiad_table cannot be reverted.\n";

        return false;
    }
    */
}
