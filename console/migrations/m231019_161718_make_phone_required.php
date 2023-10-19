<?php

use yii\db\Migration;

/**
 * Class m231019_161718_make_phone_required
 */
class m231019_161718_make_phone_required extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'phone', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231019_161718_make_phone_required cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231019_161718_make_phone_required cannot be reverted.\n";

        return false;
    }
    */
}
