<?php

use yii\db\Migration;

/**
 * Class m201105_171918_add_questions_limit_to_test_subject_column
 */
class m201105_171918_add_questions_limit_to_test_subject_column extends Migration
{
    public $tableName = '{{%test_subject}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'questions_limit', $this->integer()->defaultValue(40));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201105_171918_add_questions_limit_to_test_subject_column cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201105_171918_add_questions_limit_to_test_subject_column cannot be reverted.\n";

        return false;
    }
    */
}
