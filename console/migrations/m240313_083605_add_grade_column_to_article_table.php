<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%article}}`.
 */
class m240313_083605_add_grade_column_to_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('article', 'grade', $this->smallInteger(2)->after('article_magazine_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
