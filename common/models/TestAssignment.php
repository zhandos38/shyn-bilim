<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "test_assignment".
 *
 * @property int $id
 * @property int|null $olympiad_id
 * @property int|null $subject_id
 * @property string $name
 * @property string $surname
 * @property string $teacher_name
 * @property string $phone
 * @property string $leader_phone
 * @property string $teacher_type_name
 * @property string $parent_name
 * @property string $parent_name_second
 * @property string $iin
 * @property int|null $school_id
 * @property int $grade
 * @property int $status
 * @property string $lang
 * @property int|null $created_at
 *
 * @property Olympiad $olympiad
 * @property Subject $subject
 * @property School $school
 * @property int $point [int(11)]
 * @property int $finished_at [int(11)]
 * @property string $patronymic [varchar(255)]
 */
class TestAssignment extends \yii\db\ActiveRecord
{
    public $region_id;
    public $city_id;

    const STATUS_OFF = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_FINISHED = 2;
    const STATUS_CERT_PAID = 3;

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
            [['olympiad_id', 'subject_id', 'school_id', 'grade', 'point', 'created_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'teacher_name', 'teacher_type_name', 'parent_name', 'parent_name_second', 'phone', 'leader_phone'], 'string', 'max' => 255],
            [['iin'], 'string', 'max' => 20],

//            ['iin', 'match', 'pattern' => '/^\d{14}$/', 'message' => Yii::t('app', 'Длина ИИН должен составлять максимум 14 цифр')],
//            ['iin', 'unique', 'targetClass' => '\common\models\TestAssignment', 'message' => Yii::t('app', 'Данный ИИН уже зарегистрирован')],

            ['lang', 'string', 'max' => 2],
            [['city_id', 'region_id', 'status'], 'integer'],

            [['iin', 'name', 'surname', 'phone', 'lang', 'school_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'olympiad_id' => Yii::t('app', 'Олимпиада'),
            'subject_id' => Yii::t('app', 'Предмет'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'iin' => Yii::t('app', 'ИИН участника'),
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'grade' => Yii::t('app', 'Класс'),
            'teacher_name' => Yii::t('app', 'Ф.И.О преподавателя'),
            'teacher_type_name' => Yii::t('app', 'Преподавателя'),
            'parent_name' => Yii::t('app', 'Анасы'),
            'parent_name_second' => Yii::t('app', 'Әкесі'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'leader_phone' => 'Жетекші мұғалімнің телефон номері*',
            'lang' => Yii::t('app', 'Язык'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'status' => Yii::t('app', 'Статус'),
            'point' => Yii::t('app', 'Баллы'),
            'created_at' => Yii::t('app', 'Время создание'),
        ];
    }

    public function getOlympiad()
    {
        return $this->hasOne(Olympiad::className(), ['id' => 'olympiad_id']);
    }

    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'test_id']);
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
            self::STATUS_CERT_PAID => 'Сертификат оплачен',
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
