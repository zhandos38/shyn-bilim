<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 */
class m221203_093511_add_grades_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subject', 'grades', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
