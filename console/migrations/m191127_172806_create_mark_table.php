<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mark}}`.
 */
class m191127_172806_create_mark_table extends Migration
{
    public $tableName = '{{%mark}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'address' => $this->string(),
            'building_category_id' => $this->tinyInteger(),
            'floors' => $this->integer(),
            'built_at' => $this->integer(),
            'building_type_id' => $this->tinyInteger(),
            'destination' => $this->text(),
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
