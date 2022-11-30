<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property int $olympiad_id
 * @property int $subject_id
 * @property int $grade_from
 * @property int $grade_to
 * @property string $lang
 * @property int $level
 * @property int|null $created_at
 *
 * @property Question $questions
 * @property Subject $subject
 * @property Olympiad $olympiad
 * @property int $time_limit [int(11)]
 * @property int $question_limit [int(11)]
 */
class Test extends \yii\db\ActiveRecord
{
    const LEVEL_LOW = 0;
    const LEVEL_MIDDLE = 1;
    const LEVEL_STRONG = 2;

    const LANG_RU = 'RU';
    const LANG_KZ = 'KZ';

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
            [['olympiad_id', 'subject_id', 'question_limit', 'time_limit', 'level', 'grade_from', 'grade_to', 'created_at'], 'integer'],

            ['lang', 'string', 'max' => 2],
            [['olympiad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Olympiad::className(), 'targetAttribute' => ['olympiad_id' => 'id']],

            ['olympiad_id', 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'olympiad_id' => Yii::t('app', 'Олимпиада'),
            'subject_id' => Yii::t('app', 'Предмет'),
            'grade_from' => Yii::t('app', 'Класс от'),
            'grade_to' => Yii::t('app', 'Класс до'),
            'level' => Yii::t('app', 'Уровень'),
            'lang' => Yii::t('app', 'Язык'),
            'question_limit' => Yii::t('app', 'Ограничение по кол. вопросов'),
            'time_limit' => Yii::t('app', 'Ограничение по времени'),
            'created_at' => Yii::t('app', 'Время добавления'),
        ];
    }

    public function getOlympiad()
    {
        return $this->hasOne(Olympiad::className(), ['id' => 'olympiad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['test_id' => 'id'])->orderBy('RAND()')->limit($this->question_limit);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionsTotal()
    {
        return $this->hasMany(Question::className(), ['test_id' => 'id']);
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
     * Gets Levels list
     */
    public static function getLevels() {
        return [
            self::LEVEL_LOW => 'Слабый',
            self::LEVEL_MIDDLE => 'Средний',
            self::LEVEL_STRONG => 'Сложный',
        ];
    }
    /**
     * @return mixed
     */
    public function getLevelLabel()
    {
        return ArrayHelper::getValue(static::getLevels(), $this->level);
    }

    /**
     * Gets Levels list
     */
    public static function getLangList() {
        return [
            self::LANG_KZ => 'KZ',
            self::LANG_RU => 'RU',
        ];
    }
    /**
     * @return mixed
     */
    public function getLangLabel()
    {
        return ArrayHelper::getValue(static::getLangList(), $this->lang);
    }
}
