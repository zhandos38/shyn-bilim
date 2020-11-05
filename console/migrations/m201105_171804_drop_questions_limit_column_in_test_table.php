<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%questions_limit_column_in_test}}`.
 */
class m201105_171804_drop_questions_limit_column_in_test_table extends Migration
{
    public $tableName = '{{%test}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'questions_limit');
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
