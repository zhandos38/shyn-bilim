<?php

use yii\db\Migration;

/**
 * Class m201108_175454_replace_test_id_column_in_test_subject_table
 */
class m201108_175454_replace_test_id_column_in_test_subject_table extends Migration
{
    public $tableName = '{{%test_subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-test-subject-test_id-test-id', $this->tableName);
        $this->dropColumn($this->tableName, 'test_id');

        $this->addColumn($this->tableName, 'test_option_id', $this->integer()->after('id'));
        $this->addForeignKey('fk-test-subject-test_option_id-test-option-id', $this->tableName, 'test_option_id', 'test_option', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201108_175454_replace_test_id_column_in_test_subject_table cannot be reverted.\n";

        return false;
    }
}
