<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test}}`.
 */
class m221130_170657_add_subject_id_column_to_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test', 'subject_id', $this->integer()->after('olympiad_id'));

        $this->addForeignKey('fk-test-subject_id-subject-id', 'test', 'subject_id', 'subject', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
