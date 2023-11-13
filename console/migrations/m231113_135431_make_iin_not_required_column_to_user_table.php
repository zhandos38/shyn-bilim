<?php

use yii\db\Migration;

/**
 * Class m231113_135431_make_iin_not_required_column_to_user_table
 */
class m231113_135431_make_iin_not_required_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('user', 'iin', $this->string(20)->null()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231113_135431_make_iin_not_required_column_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231113_135431_make_iin_not_required_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
