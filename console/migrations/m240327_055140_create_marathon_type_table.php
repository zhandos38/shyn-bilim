<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%marathon_type}}`.
 */
class m240327_055140_create_marathon_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%marathon_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%marathon_type}}');
    }
}
