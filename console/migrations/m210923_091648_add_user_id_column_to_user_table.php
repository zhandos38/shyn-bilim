<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m210923_091648_add_user_id_column_to_user_table extends Migration
{
    public $tableName = '{{%article}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'user_id', $this->integer());
        $this->addForeignKey('fk-article-user_id-user-id', $this->tableName, 'user_id', 'user', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210923_091648_add_user_id_column_to_user_table can not be reverted";
    }
}
