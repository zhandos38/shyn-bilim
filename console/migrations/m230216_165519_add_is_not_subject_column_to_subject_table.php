<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 */
class m230216_165519_add_is_not_subject_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("subject", "is_not_subject", $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
