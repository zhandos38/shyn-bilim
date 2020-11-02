<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%olympiad}}`.
 */
class m201102_145133_create_olympiad_table extends Migration
{
    public $tableName = '{{%olympiad}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
