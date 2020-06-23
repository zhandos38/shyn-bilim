<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 *
 * @property ProjectArticle[] $projectArticles
 * @property string $image
 * @property string $img [varchar(255)]
 * @property bool $type [tinyint(3)]
 */
class Project extends \yii\db\ActiveRecord
{
    const TYPE_PROJECT = 0;
    const TYPE_CONTEST = 1;

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            ['type', 'integer'],

            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'type' => 'Тип',
            'imgFile' => 'Рисунок',
        ];
    }

    /**
     * Gets query for [[ProjectArticles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectArticles()
    {
        return $this->hasMany(ProjectArticle::className(), ['project_id' => 'id']);
    }

    public function getImage()
    {
        return Yii::$app->params['staticDomain'] . '/project/' . $this->img;
    }

    public function upload()
    {
        if ($this->imageFile === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/project';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;

        if ($this->validate()) {
            $this->imageFile->saveAs($imgPath);
            return Image::resize($imgPath,375, 625, true)->save();
        }

        return false;
    }
}
