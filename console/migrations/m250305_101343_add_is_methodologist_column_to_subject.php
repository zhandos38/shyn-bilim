<?php

use yii\db\Migration;

/**
 * Class m250305_101343_add_is_methodologist_column_to_subject
 */
class m250305_101343_add_is_methodologist_column_to_subject extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test_assignment', 'is_methodologist', $this->boolean()->notNull()->defaultValue(false)->after('point'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250305_101343_add_is_methodologist_column_to_subject cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250305_101343_add_is_methodologist_column_to_subject cannot be reverted.\n";

        return false;
    }
    */
}
