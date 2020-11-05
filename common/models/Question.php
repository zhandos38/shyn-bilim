<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int|null $test_id
 * @property string|null $text
 * @property int|null $created_at
 *
 * @property \yii\db\ActiveQuery $answers
 * @property TestSubject $testSubject
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_subject_id', 'created_at'], 'integer'],
            [['text'], 'string'],
            [['options'], 'safe'],
            [['test_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestSubject::className(), 'targetAttribute' => ['test_subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_subject_id' => 'Test ID',
            'text' => 'Text',
            'options' => 'Options',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestSubject()
    {
        return $this->hasOne(TestSubject::className(), ['id' => 'test_subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
    }
}
