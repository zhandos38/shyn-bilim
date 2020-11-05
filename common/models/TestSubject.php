<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test_subject".
 *
 * @property int $id
 * @property int|null $test_id
 * @property int|null $subject_id
 * @property int|null $questions_limit
 *
 * @property Subject $subject
 * @property Test $test
 */
class TestSubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'subject_id', 'questions_limit'], 'integer'],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test',
            'subject_id' => 'Subject',
            'questions_limit' => 'Questions limit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['test_subject_id' => 'id'])->orderBy('RAND()')->limit($this->questions_limit);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionsTotal()
    {
        return $this->hasMany(Question::className(), ['test_subject_id' => 'id']);
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

    /**
     * Gets query for [[Test]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
    }
}
