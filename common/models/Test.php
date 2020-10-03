<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $subject_id
 * @property int|null $grade
 * @property int|null $created_at
 *
 * @property Question $questions
 * @property Subject $subject
 * @property int $questions_limit [int(11)]
 * @property int $time_limit [int(11)]
 * @property string $lang [varchar(2)]
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'questions_limit', 'time_limit', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            ['lang', 'string', 'max' => 2],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],

            ['grade', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Название'),
            'subject_id' => Yii::t('app', 'Предмет'),
            'grade' => Yii::t('app', 'Класс'),
            'lang' => Yii::t('app', 'Язык'),
            'questions_limit' => Yii::t('app', 'Ограничение вопросов'),
            'time_limit' => Yii::t('app', 'Ограничение по времени'),
            'created_at' => Yii::t('app', 'Время добавления')
        ];
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
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['test_id' => 'id'])->orderBy('RAND()')->limit($this->questions_limit);
    }
}
