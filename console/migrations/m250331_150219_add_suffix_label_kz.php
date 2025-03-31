<?php

use yii\db\Migration;

/**
 * Class m250331_150219_add_suffix_label_kz
 */
class m250331_150219_add_suffix_label_kz extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subject', 'suffix_label_kz', $this->string()->after('is_not_subject'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250331_150219_add_suffix_label_kz cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250331_150219_add_suffix_label_kz cannot be reverted.\n";

        return false;
    }
    */
}
