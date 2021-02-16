<?php

use yii\db\Migration;

/**
 * Class m210216_173031_modify_file_columns_in_olympiad_table
 */
class m210216_173031_modify_file_columns_in_olympiad_table extends Migration
{
    public $tableName = '{{%olympiad}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->tableName, 'file', 'file_kz');
        $this->addColumn($this->tableName, 'file_ru', $this->string()->after('file_kz'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210216_173031_modify_file_columns_in_olympiad_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210216_173031_modify_file_columns_in_olympiad_table cannot be reverted.\n";

        return false;
    }
    */
}
