<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%olympiad}}`.
 */
class m230128_092005_add_folder_name_column_to_olympiad_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("olympiad", "folder_name", $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
