<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%test_assignment}}`.
 */
class m200805_161409_add_patronymic_column_to_test_assignment_table extends Migration
{
    public $tableName = '{{%test_assignment}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'patronymic', $this->string()->after('surname'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'patronymic');
    }
}
