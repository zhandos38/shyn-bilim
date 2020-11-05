<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%test_id_column_in_question}}`.
 */
class m201105_173058_drop_test_id_column_in_question_table extends Migration
{
    public $tableName = '{{%question}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-question-test_id-test-id', $this->tableName);
        $this->dropColumn($this->tableName, 'test_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201105_171918_add_questions_limit_to_test_subject_column cannot be reverted.\n";

        return false;
    }
}
