<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m201111_032412_add_kinder_garden_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%test_assignment}}', 'kinder_garden', $this->text()->after('school_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration cannot be reverted.\n";

        return false;
    }
}
