<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test}}`.
 */
class m201102_145310_add_olympiad_id_column_to_test_table extends Migration
{
    public $tableName = '{{%test}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'olympiad_id', $this->integer()->after('id'));
        $this->addForeignKey('fk-test-olympiad_id-olympiad-id', $this->tableName, 'olympiad_id', 'olympiad', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-test-olympiad_id-olympiad-id', $this->tableName);
        $this->dropColumn($this->tableName, 'olympiad_id');
    }
}
