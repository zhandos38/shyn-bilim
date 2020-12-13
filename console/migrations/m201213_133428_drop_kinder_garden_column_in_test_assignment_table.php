<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%kinder_garden_column_in_test_assignment}}`.
 */
class m201213_133428_drop_kinder_garden_column_in_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%test_assignment}}', 'kinder_garden');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201213_133428_drop_kinder_garden_column_in_test_assignment_table cannot be reverted.\n";

        return false;
    }
}
