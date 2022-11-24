<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "test_assignment".
 *
 * @property int $id
 * @property int|null $test_option_id
 * @property string $name
 * @property string $surname
 * @property string $leader_name
 * @property string $leader_name_second
 * @property string $leader_name_third
 * @property string $parent_name
 * @property string $iin
 * @property int|null $school_id
 * @property int|null $subject_id
 * @property int $grade
 * @property int $status
 * @property string $phone
 * @property string $phone_student
 * @property string $lang
 * @property int|null $created_at
 *
 * @property TestOption $testOption
 * @property Subject $subject
 * @property School $school
 * @property int $point [int(11)]
 * @property int $finished_at [int(11)]
 * @property string $patronymic [varchar(255)]
 */
class TestAssignment extends \yii\db\ActiveRecord
{
    public $lang;
    public $region_id;
    public $city_id;

    const STATUS_OFF = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_FINISHED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_option_id', 'school_id', 'grade', 'point', 'subject_id', 'created_at'], 'integer'],
            [['iin', 'leader_name'], 'required'],
            [['name', 'surname', 'patronymic', 'leader_name', 'leader_name_second', 'leader_name_third', 'parent_name'], 'string', 'max' => 255],
            [['iin', 'phone', 'phone_student'], 'string', 'max' => 20],
            [['test_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => TestOption::className(), 'targetAttribute' => ['test_option_id' => 'id']],

//            ['iin', 'match', 'pattern' => '/^\d{14}$/', 'message' => Yii::t('app', 'Длина ИИН должен составлять максимум 14 цифр')],
//            ['iin', 'unique', 'targetClass' => '\common\models\TestAssignment', 'message' => Yii::t('app', 'Данный ИИН уже зарегистрирован')],

            ['lang', 'string', 'max' => 2],
            [['city_id', 'region_id', 'status'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_option_id' => 'Тест',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'iin' => Yii::t('app', 'ИИН'),
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'subject_id' => Yii::t('app', 'Предмет'),
            'grade' => Yii::t('app', 'Класс'),
            'leader_name' => Yii::t('app', 'Ф.И.О руководителя'),
            'leader_name_second' => Yii::t('app', 'Ф.И.О руководителя'),
            'parent_name' => Yii::t('app', 'Ф.И.О родителей'),
            'lang' => Yii::t('app', 'Язык'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'status' => Yii::t('app', 'Статус'),
            'point' => Yii::t('app', 'Баллы'),
            'phone' => Yii::t('app', 'Номер телефона преподавателей'),
            'phone_student' => Yii::t('app', 'Номер телефона ученика'),
            'created_at' => Yii::t('app', 'Время создание'),
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
     * Gets query for [[TestOption]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestOption()
    {
        return $this->hasOne(TestOption::className(), ['id' => 'test_option_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_OFF => 'Не оплачено',
            self::STATUS_ACTIVE => 'Оплачено',
            self::STATUS_FINISHED => 'Завершено',
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }

    public function getGrade()
    {
        return $this->grade . ' сынып оқушысы';
    }
}
