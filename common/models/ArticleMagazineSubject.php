<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_magazine_subject".
 *
 * @property int $id
 * @property int|null $article_magazine_id
 * @property int|null $subject_id
 *
 * @property ArticleMagazine $articleMagazine
 * @property Subject $subject
 */
class ArticleMagazineSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_magazine_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_magazine_id', 'subject_id'], 'integer'],
            [['article_magazine_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleMagazine::className(), 'targetAttribute' => ['article_magazine_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
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
            'subject_id' => 'Предмет',
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

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}
