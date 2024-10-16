<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
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
 * @property int $article_magazine_id
 * @property int $grade
 * @property string $lead_name
 * @property int $subject_id
 * @property int $status
 * @property string $iin
 * @property string $phone
 * @property mixed $subject
 * @property int|null $created_at
 * @property-read \yii\db\ActiveQuery $school
 * @property int $school_id [int(11)]
 * @property int $user_id [int(11)]
 */
class Article extends \yii\db\ActiveRecord
{
    public $region_id;
    public $city_id;

    const STATUS_OFF = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PUBLISHED = 2;

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
            [['name', 'surname', 'topic', 'subject_id', 'school_id', 'article_magazine_id', 'iin', 'phone'], 'required'],
            [['subject_id', 'status', 'school_id', 'user_id', 'created_at', 'iin', 'article_magazine_id', 'grade'], 'integer'],
            [['name', 'surname', 'patronymic', 'topic', 'file', 'lead_name'], 'string', 'max' => 255],
            [['iin', 'phone'], 'string', 'max' => 20],

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
            'iin' => Yii::t('app', 'ИИН'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'file' => Yii::t('app', 'Файл'),
            'fileTemp' => Yii::t('app', 'Выбрать файл'),
            'article_magazine_id' => Yii::t('app', 'Журнал'),
            'grade' => Yii::t('app', 'Класс'),
            'lead_name' => Yii::t('app', 'Ф.И.О преподавателя'),
            'subject_id' => Yii::t('app', 'Предмет'),
            'region_id' => Yii::t('app', 'Регион'),
            'city_id' => Yii::t('app', 'Город'),
            'school_id' => Yii::t('app', 'Школа'),
            'status' => Yii::t('app', 'Статус'),
            'created_at' => Yii::t('app', 'Время создание'),
            'user_id' => Yii::t('app', 'Пользователь'),
        ];
    }

    public function getArticleMagazine()
    {
        return $this->hasOne(ArticleMagazine::className(), ['id' => 'article_magazine_id']);
    }

    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    public function getFile()
    {
        return Yii::$app->params['staticDomain'] . '/article/' . $this->file;
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

    public static function getStatuses()
    {
        return [
            self::STATUS_OFF => 'Не оплачен',
            self::STATUS_ACTIVE => 'Оплачен',
            self::STATUS_PUBLISHED => 'Опубликован',
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }
}
