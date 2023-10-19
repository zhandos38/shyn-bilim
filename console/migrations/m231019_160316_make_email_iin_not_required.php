<?php

use yii\db\Migration;

/**
 * Class m231019_160316_make_email_iin_not_required
 */
class m231019_160316_make_email_iin_not_required extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'email', $this->string()->null());
        $this->alterColumn('user', 'iin', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231019_160316_make_email_iin_not_required cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231019_160316_make_email_iin_not_required cannot be reverted.\n";

        return false;
    }
    */
}
