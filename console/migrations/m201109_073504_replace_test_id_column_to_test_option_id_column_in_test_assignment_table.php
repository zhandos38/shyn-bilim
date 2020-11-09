<?php

use yii\db\Migration;

/**
 * Class m201109_073504_replace_test_id_column_to_test_option_id_column_in_test_assignment_table
 */
class m201109_073504_replace_test_id_column_to_test_option_id_column_in_test_assignment_table extends Migration
{
    public $tableName = '{{%test_assignment}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-test-assignment-test_id-test-id', $this->tableName);
        $this->dropColumn($this->tableName, 'test_id');
        $this->addColumn($this->tableName, 'test_option_id', $this->integer()->after('id'));
        $this->addForeignKey('fk-test-assignment-test_option_id-test-option-id', $this->tableName, 'test_option_id', 'test_option', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201109_073504_replace_test_id_column_to_test_option_id_column_in_test_assignment_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201109_073504_replace_test_id_column_to_test_option_id_column_in_test_assignment_table cannot be reverted.\n";

        return false;
    }
    */
}
