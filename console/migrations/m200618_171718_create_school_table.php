<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m200618_171718_create_school_table extends Migration
{
    public $tableName = '{{%school}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'city_id' => $this->integer()
        ]);

        $this->addForeignKey('fk-school-city_id-city-id', $this->tableName, 'city_id', 'city', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-school-city_id-city-id', $this->tableName);
        $this->dropTable($this->tableName);
    }
}
