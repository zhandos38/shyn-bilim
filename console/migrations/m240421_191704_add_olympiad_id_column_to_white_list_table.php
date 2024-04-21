<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%white_list}}`.
 */
class m240421_191704_add_olympiad_id_column_to_white_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('white_list', 'olympiad_id', $this->integer()->null());

        $this->addForeignKey('fk-white-list-olympiad_id-olympiad-id', 'white_list', 'olympiad_id', 'olympiad', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
