<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscribe}}`.
 */
class m210922_183152_create_subscribe_table extends Migration
{
    public $tableName = '{{%subscribe}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'status' => $this->tinyInteger(2)->defaultValue(0),
            'created_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk-subscribe-user_id-user-id', $this->tableName, 'user_id', '{{%user}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
