<?php

use yii\db\Migration;

/**
 * Class m240219_060124_make_magazine_number_string
 */
class m240219_060124_make_magazine_number_string extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('magazine', 'number', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240219_060124_make_magazine_number_string cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240219_060124_make_magazine_number_string cannot be reverted.\n";

        return false;
    }
    */
}
