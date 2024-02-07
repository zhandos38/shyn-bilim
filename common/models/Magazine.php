<?php

namespace common\models;

use yii\helpers\VarDumper;
use yii\imagine\Image;
use Yii;

/**
 * This is the model class for table "magazine".
 *
 * @property int $id
 * @property string $number
 * @property string $image
 * @property string $file
 * @property int $order
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
            [['number', 'image', 'file'], 'required'],
            [['created_at', 'order'], 'integer'],
            [['image', 'file'], 'string', 'max' => 255],

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
            'number' => 'Номер',
            'image' => 'Рисунок',
            'imageFile' => 'Файл рисунка',
            'file' => 'Файл',
            'fileTemp' => 'Файл',
            'order' => 'Порядок',
            'created_at' => 'Время добавления',
        ];
    }

    public function getFile()
    {
        return Yii::$app->params['staticDomain'] . '/magazine/' . $this->file;
    }

    public function getImage()
    {
        return $this->image ? Yii::$app->params['staticDomain'] . '/magazine/' . $this->image : '/img/no-magazine.png';
    }

    public function upload()
    {
        if ($this->imageFile === null && $this->fileTemp === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/magazine';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $filePath = $folderPath . '/' . $this->fileTemp->baseName . '.' . $this->fileTemp->extension;

        if ($this->validate()) {
            if ($this->imageFile) {
                $this->imageFile->saveAs($imgPath);
                Image::resize($imgPath,375, 625, true)->save();
            }

            if ($this->fileTemp) {
                $this->fileTemp->saveAs($filePath);
            }

            return true;
        }

        return false;
    }
}
