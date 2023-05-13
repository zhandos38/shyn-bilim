<?php

use yii\db\Migration;

/**
 * Class m230513_062153_grade_not_required_in_test_assignment
 */
class m230513_062153_grade_not_required_in_test_assignment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('test_assignment', 'grade', $this->integer()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230513_062153_grade_not_required_in_test_assignment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230513_062153_grade_not_required_in_test_assignment cannot be reverted.\n";

        return false;
    }
    */
}
