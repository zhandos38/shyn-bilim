<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m201108_100135_add_file_column_to_olympiad_table extends Migration
{
    public $tableName = '{{%olympiad}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'file', $this->string()->after('img'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";

        return false;
    }
}
