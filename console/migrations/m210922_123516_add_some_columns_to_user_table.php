<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m210922_123516_add_some_columns_to_user_table extends Migration
{
    public $tableName = '{{%user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'name', $this->string()->notNull());
        $this->addColumn($this->tableName, 'surname', $this->string()->notNull());
        $this->addColumn($this->tableName, 'patronymic', $this->string());
        $this->addColumn($this->tableName, 'iin', $this->string()->notNull());
        $this->addColumn($this->tableName, 'phone', $this->string());
        $this->addColumn($this->tableName, 'address', $this->string());
        $this->addColumn($this->tableName, 'school_id', $this->string()->notNull());
        $this->addColumn($this->tableName, 'post', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
