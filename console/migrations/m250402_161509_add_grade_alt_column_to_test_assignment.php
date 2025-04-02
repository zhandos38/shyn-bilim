<?php

use yii\db\Migration;

/**
 * Class m250402_161509_add_grade_alt_column_to_test_assignment
 */
class m250402_161509_add_grade_alt_column_to_test_assignment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test_assignment', 'grade_alt', $this->string()->null()->after('grade'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250402_161509_add_grade_alt_column_to_test_assignment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250402_161509_add_grade_alt_column_to_test_assignment cannot be reverted.\n";

        return false;
    }
    */
}
