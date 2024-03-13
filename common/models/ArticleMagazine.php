<?php

namespace common\models;

use yii\helpers\VarDumper;
use yii\imagine\Image;
use Yii;

/**
 * This is the model class for table "magazine".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property int $order
 * @property string $type
 * @property string $folder_name
 * @property boolean $is_cert_landscape
 * @property boolean $is_charter_landscape
 */
class ArticleMagazine extends \yii\db\ActiveRecord
{
    public $imgFile;

    const TYPE_TEACHER = "teacher";
    const TYPE_STUDENT = "student";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_magazine';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img', 'folder_name'], 'required'],
            [['name', 'img', 'folder_name', 'type'], 'string', 'max' => 255],
            ['order', 'integer'],
            [['is_cert_landscape', 'is_charter_landscape'], 'boolean'],

            [['imgFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Найменование',
            'img' => 'Рисунок',
            'imgFile' => 'Файл рисунка',
            'order' => 'Порядок',
            'folder_name' => 'Папка',
            'type' => 'Тип',
            'is_cert_landscape' => 'Сертификат горизонтальный',
            'is_charter_landscape' => 'Сертификат портретный',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleMagazineSubjects()
    {
        return $this->hasMany(ArticleMagazineSubject::className(), ['article_magazine_id' => 'id']);
    }

    public function getImage()
    {
        return $this->img ? Yii::$app->params['staticDomain'] . '/article-magazine/' . $this->img : '/img/no-magazine.png';
    }

    public function upload()
    {
        if ($this->imgFile === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/article-magazine';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $this->imgFile->baseName . '.' . $this->imgFile->extension;

        if ($this->validate()) {
            if ($this->imgFile) {
                $this->imgFile->saveAs($imgPath);
            }

            return true;
        }

        return false;
    }

    public function getFolderPath($subName = null)
    {
        return $this->folder_name ? $this->folder_name . "/" . $subName : $subName;
    }
}
