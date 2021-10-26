<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%marathon}}`.
 */
class m211026_052634_create_marathon_table extends Migration
{
    public $tableName = '{{%marathon}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'patronymic' => $this->string(),
            'iin' => $this->string(20),
            'school_id' => $this->integer(),
            'grade' => $this->integer(2),
            'phone' => $this->string(20),
            'phone_parent' => $this->string(20),
            'phone_teacher' => $this->string(20),
        ]);

        $this->addForeignKey('fk-marathon-school_id-school-id', 'marathon', 'school_id', 'school', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
