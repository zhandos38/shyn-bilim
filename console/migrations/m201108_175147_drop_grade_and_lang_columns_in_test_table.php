<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%grade_and_lang_columns_in_test}}`.
 */
class m201108_175147_drop_grade_and_lang_columns_in_test_table extends Migration
{
    public $tableName = '{{%test}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn($this->tableName, 'grade');
        $this->dropColumn($this->tableName, 'lang');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "This migration can not be reverted";

        return false;
    }
}
