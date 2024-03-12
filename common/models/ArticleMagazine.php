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
 */
class ArticleMagazine extends \yii\db\ActiveRecord
{
    public $imgFile;

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
            [['name', 'img'], 'required'],
            [['name', 'img'], 'string', 'max' => 255],
            ['order', 'integer'],

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
        ];
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
}
