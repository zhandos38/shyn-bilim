<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%magazine}}`.
 */
class m231026_083926_add_order_column_to_magazine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('magazine', 'order', $this->integer()->after('file')->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
