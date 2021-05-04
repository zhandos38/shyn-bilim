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
 * @property float|null $price
 * @property string|null $img
 * @property int|null $order
 * @property string|null $file_kz
 * @property string|null $file_ru
 *
 * @property Test[] $tests
 */
class Olympiad extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $fileTempKz;
    public $fileTempRu;

    const STATUS_FINISHED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_NEW = 2;

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
            [['type'], 'boolean'],
            ['price', 'number'],
            [['status', 'order'], 'integer'],

            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['fileTempKz', 'fileTempRu'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx'],
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
            'fileTempKz' => 'Файл (KZ)',
            'fileTempRu' => 'Файл (RU)',
            'type' => 'Тип',
            'imageFile' => 'Рисунок',
            'status' => 'Статус',
            'price' => 'Цена',
            'order' => 'Порядок',
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
            self::STATUS_FINISHED => 'Завершено',
            self::STATUS_ACTIVE => 'Включено',
            self::STATUS_NEW => 'Новая'
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }

    public static function getTypes()
    {
        return [
            self::TYPE_STUDENT => Yii::t('app', 'Интеллектуальная олимпиада'),
            self::TYPE_TEACHER => Yii::t('app', 'Олимпиада для преподавателей')
        ];
    }

    public function getType()
    {
        return ArrayHelper::getValue(self::getTypes(), $this->type);
    }

    public function getFile()
    {
        $fileName = Yii::$app->language === 'ru' ? $this->file_ru : $this->file_kz;
        return Yii::$app->params['staticDomain'] . '/olympiad/' . $fileName;
    }

    public function getImage()
    {
        return Yii::$app->params['staticDomain'] . '/olympiad/' . $this->img;
    }

    public function upload()
    {
        if ($this->imageFile === null && $this->fileTempKz === null && $this->fileTempRu === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/olympiad';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        if ($this->validate()) {
            if ($this->imageFile) {
                $imgPath = $folderPath . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs($imgPath);
                Image::resize($imgPath,375, 625, true)
                    ->save();
            }

            if ($this->fileTempKz) {
                $filePathKz = $folderPath . '/' . $this->fileTempKz->baseName . '.' . $this->fileTempKz->extension;
                $this->fileTempKz->saveAs($filePathKz);
            }

            if ($this->fileTempRu) {
                $filePathRu = $folderPath . '/' . $this->fileTempRu->baseName . '.' . $this->fileTempRu->extension;
                $this->fileTempRu->saveAs($filePathRu);
            }

            return true;
        }

        return false;
    }
}
