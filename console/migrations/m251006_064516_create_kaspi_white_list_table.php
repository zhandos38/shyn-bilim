<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kaspi_white_list}}`.
 */
class m251006_064516_create_kaspi_white_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kaspi_white_list}}', [
            'id' => $this->primaryKey(),
            'iin' => $this->string(20),
            'date' => $this->string(),
            'amount' => $this->integer(),
            'is_activated' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kaspi_white_list}}');
    }
}
