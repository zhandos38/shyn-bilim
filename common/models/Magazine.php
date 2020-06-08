<?php

namespace common\models;

use yii\imagine\Image;
use Yii;

/**
 * This is the model class for table "magazine".
 *
 * @property int $id
 * @property int $number
 * @property string $image
 * @property string $file
 * @property int|null $created_at
 */
class Magazine extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $fileTemp;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'magazine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'image'], 'required'],
            [['number', 'created_at'], 'integer'],
            [['image', 'file'], 'string', 'max' => 255],

            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'number' => 'Номер',
            'image' => 'Рисунок',
            'imageFile' => 'Файл рисунка',
            'file' => 'Файл',
            'created_at' => 'Время добавления',
        ];
    }

    public function getImage()
    {
        return $this->image ? Yii::$app->params['staticDomain'] . '/magazine/' . $this->image : '/img/no-magazine.png';
    }

    public function upload()
    {
        if ($this->imageFile === null) {
            return true;
        }

        $imageFolderPath = Yii::getAlias('@static') . '/magazine';

        if (!file_exists($imageFolderPath) && !mkdir($imageFolderPath, 0777, true) && !is_dir($imageFolderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $imageFolderPath));
        }

        $imgPath = $imageFolderPath . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;


        if ($this->validate()) {
            $this->imageFile->saveAs($imgPath);
            return Image::resize($imgPath,375, 625, true)->save();
        }

        return false;
    }
}
