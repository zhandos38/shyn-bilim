<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $file
 * @property string $img
 * @property string|null $age_range
 * @property int|null $book_category_id
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'file', 'img'], 'required'],
            [['book_category_id'], 'integer'],
            [['name', 'file', 'img', 'age_range'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'file' => 'File',
            'img' => 'Img',
            'age_range' => 'Age Range',
            'book_category_id' => 'Book Category ID',
        ];
    }
}
