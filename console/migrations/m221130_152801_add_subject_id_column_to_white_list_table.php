<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%white_list}}`.
 */
class m221130_152801_add_subject_id_column_to_white_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('white_list', 'subject_id', $this->integer());

        $this->addForeignKey('fk-white_list-subject_id-subject-id', 'white_list', 'subject_id', 'subject', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
