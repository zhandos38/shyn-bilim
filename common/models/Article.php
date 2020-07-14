<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\Json;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $topic
 * @property string $file
 * @property int $subject_id
 * @property int $status
 * @property int|null $created_at
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_OFF = 0;
    const STATUS_ACTIVE = 1;
    public $fileTemp;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'topic', 'file', 'subject_id', 'status'], 'required'],
            [['subject_id', 'status', 'created_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'topic', 'file'], 'string', 'max' => 255],

            [['fileTemp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx, ttf', 'maxSize' => 1024 * 1024 * 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'topic' => Yii::t('app', 'Название'),
            'file' => Yii::t('app', 'Файл'),
            'fileTemp' => Yii::t('app', 'Файл'),
            'subject_id' => Yii::t('app', 'Предмет'),
            'status' => Yii::t('app', 'Статус'),
            'created_at' => Yii::t('app', 'Время создание'),
        ];
    }

    public function getFile()
    {
        return Yii::$app->params['staticDomain'] . '/project/' . $this->file;
    }

    public function upload()
    {
        if ($this->fileTemp === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/article';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $filePath = $folderPath . '/' . $this->fileTemp->baseName . '.' . $this->fileTemp->extension;

        if ($this->validate()) {
            return $this->fileTemp->saveAs($filePath);
        }

        throw new Exception(Json::encode($this->errors));
    }
}
