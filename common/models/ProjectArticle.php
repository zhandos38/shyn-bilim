<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\Json;
use yii\imagine\Image;

/**
 * This is the model class for table "project_article".
 *
 * @property int $id
 * @property string $topic
 * @property string|null $file
 * @property int|null $project_id
 * @property int|null $created_at
 *
 * @property Project $project
 * @property string $name [varchar(255)]
 * @property string $surname [varchar(255)]
 * @property string $patronymic [varchar(255)]
 */
class ProjectArticle extends \yii\db\ActiveRecord
{
    public $fileTemp;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'topic'], 'required'],
            [['project_id', 'created_at'], 'integer'],
            [['topic', 'file', 'name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],

            [['fileTemp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx, ttf'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'topic' => 'Тема',
            'file' => 'Файл',
            'fileTemp' => 'Файл',
            'project_id' => 'Проект',
            'created_at' => 'Время добавление',
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
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

        $folderPath = Yii::getAlias('@static') . '/project';

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
