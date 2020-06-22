<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%project_article}}`.
 */
class m200622_183913_add_author_columns_to_project_article_table extends Migration
{
    public $tableName = '{{%project_article}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->tableName, 'name', $this->string()->notNull()->after('id'));
        $this->addColumn($this->tableName, 'surname', $this->string()->notNull()->after('name'));
        $this->addColumn($this->tableName, 'patronymic', $this->string()->after('surname'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->tableName, 'name');
        $this->dropColumn($this->tableName, 'surname');
        $this->dropColumn($this->tableName, 'patronymic');
    }
}
