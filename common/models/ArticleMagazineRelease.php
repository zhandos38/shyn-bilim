<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "article_magazine_release".
 *
 * @property int $id
 * @property int|null $article_magazine_id
 * @property string|null $name
 * @property string|null $img
 * @property string|null $file
 *
 * @property ArticleMagazine $articleMagazine
 */
class ArticleMagazineRelease extends \yii\db\ActiveRecord
{
    public $imgFile;
    public $fileTemp;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_magazine_release';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_magazine_id'], 'integer'],
            [['name', 'img', 'file'], 'string', 'max' => 255],
            [['article_magazine_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleMagazine::className(), 'targetAttribute' => ['article_magazine_id' => 'id']],

            [['imgFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['fileTemp'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, doc, docx'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_magazine_id' => 'Журнал',
            'name' => 'Найменование',
            'img' => 'Рисунок',
            'file' => 'Файл',
        ];
    }

    /**
     * Gets query for [[ArticleMagazine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleMagazine()
    {
        return $this->hasOne(ArticleMagazine::className(), ['id' => 'article_magazine_id']);
    }

    public function getFile()
    {
        return Yii::$app->params['staticDomain'] . '/article-magazine-release/' . $this->file;
    }

    public function getImage()
    {
        return $this->img ? Yii::$app->params['staticDomain'] . '/article-magazine-release/' . $this->img : '/img/no-magazine.png';
    }

    public function upload()
    {
        if ($this->imgFile === null && $this->fileTemp === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/article-magazine-release';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $this->imgFile->baseName . '.' . $this->imgFile->extension;
        $filePath = $folderPath . '/' . $this->fileTemp->baseName . '.' . $this->fileTemp->extension;

        if ($this->validate()) {
            if ($this->imgFile) {
                $this->imgFile->saveAs($imgPath);
            }

            if ($this->fileTemp) {
                $this->fileTemp->saveAs($filePath);
            }

            return true;
        }

        return false;
    }
}
