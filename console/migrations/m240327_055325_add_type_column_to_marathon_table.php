<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%marathon}}`.
 */
class m240327_055325_add_type_column_to_marathon_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('marathon', 'marathon_type_id', $this->integer()->null()->after('phone_teacher'));

        $this->addForeignKey('fk-marathon-type', 'marathon', 'marathon_type_id', 'marathon_type', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
