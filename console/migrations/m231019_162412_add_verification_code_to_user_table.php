<?php

use yii\db\Migration;

/**
 * Class m231019_162412_add_verification_code_to_user_table
 */
class m231019_162412_add_verification_code_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'verification_code', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231019_162412_add_verification_code_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231019_162412_add_verification_code_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
