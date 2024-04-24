<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m240424_103617_add_leader_phone_column_to_test_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('test_assignment', 'leader_phone', $this->string()->null()->after('phone'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
