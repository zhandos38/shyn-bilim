<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

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
    public $imageFile;
    public $fileTemp;

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

            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['fileTemp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
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
            'img' => 'Рисунок',
            'imageFile' => 'Файл рисунка',
            'file' => 'Файл',
            'fileTemp' => 'Файл',
            'age_range' => 'Age Range',
            'book_category_id' => 'Book Category ID',
        ];
    }

    public function getFile()
    {
        return Yii::$app->params['staticDomain'] . '/book/' . $this->file;
    }

    public function getImage()
    {
        return $this->img ? Yii::$app->params['staticDomain'] . '/book/' . $this->img : '/img/no-magazine.png';
    }

    public function getBookCategory()
    {
        return $this->hasOne(BookCategory::className(), ['id' => 'book_category_id']);
    }

    public function upload()
    {
        if ($this->imageFile === null && $this->fileTemp === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/book';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $filePath = $folderPath . '/' . $this->fileTemp->baseName . '.' . $this->fileTemp->extension;

        if ($this->validate()) {
            if ($this->imageFile) {
                $this->imageFile->saveAs($imgPath);
            }

            if ($this->fileTemp) {
                $this->fileTemp->saveAs($filePath);
            }

            return true;
        }

        return false;
    }
}
