<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sms_log}}`.
 */
class m231018_163941_create_sms_log_table extends Migration
{
    public $tableName = '{{%sms_log}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'text' => $this->string(),
            'error' => $this->text(),
            'message_type' => $this->tinyInteger(4),
            'status' => $this->tinyInteger(4),
            'created_at' => $this->integer()
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
