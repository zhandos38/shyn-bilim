<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 */
class m221201_155305_add_kind_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subject', 'kind', $this->tinyInteger(2)->defaultValue(1)->after('type'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
