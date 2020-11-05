<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%subject_id_column_in_test}}`.
 */
class m201105_170923_drop_subject_id_column_in_test_table extends Migration
{
    public $tableName = '{{%test}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-test-subject_id-subject-id', $this->tableName);
        $this->dropColumn($this->tableName, 'subject_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";

        return false;
    }
}
