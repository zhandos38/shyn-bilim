<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;

/**
 * This is the model class for table "olympiad".
 *
 * @property int $id
 * @property boolean $status
 * @property string|null $name
 * @property boolean|null $type
 * @property string|null $img
 * @property string|null $file
 *
 * @property Test[] $tests
 */
class Olympiad extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $fileTemp;

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const TYPE_STUDENT = 0;
    const TYPE_TEACHER = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'olympiad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img', 'file'], 'string', 'max' => 255],
            ['type', 'boolean'],

            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['fileTemp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'img' => 'Рисунок',
            'file' => 'Файл',
            'fileTemp' => 'Файл',
            'type' => 'Тип',
            'imageFile' => 'Рисунок',
            'status' => 'Статус'
        ];
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['olympiad_id' => 'id']);
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_INACTIVE => 'Отключено',
            self::STATUS_ACTIVE => 'Включено'
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }

    public static function getTypes()
    {
        return [
            self::TYPE_STUDENT => Yii::t('app', 'Олимпиада для школьников'),
            self::TYPE_TEACHER => Yii::t('app', 'Олимпиада для преподавателей')
        ];
    }

    public function getType()
    {
        return ArrayHelper::getValue(self::getTypes(), $this->type);
    }

    public function getFile()
    {
        return Yii::$app->params['staticDomain'] . '/olympiad/' . $this->file;
    }

    public function getImage()
    {
        return Yii::$app->params['staticDomain'] . '/olympiad/' . $this->img;
    }

    public function upload()
    {
        if ($this->imageFile === null && $this->fileTemp === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/olympiad';

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