<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "white_list".
 *
 * @property int $id
 * @property int|null $limit
 * @property string|null $iin
 */
class ArticleWhiteList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_white_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iin'], 'string', 'max' => 12],
            ['limit', 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iin' => 'IIn',
            'limit' => 'Лимит',
        ];
    }
}
