<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "book_assignment".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string $leader_name
 * @property string $leader_phone
 * @property string|null $parent_name
 * @property string|null $parent_phone
 * @property string $iin
 * @property int|null $school_id
 * @property string $grade
 * @property int|null $created_at
 *
 * @property School $school
 */
class BookAssignment extends \yii\db\ActiveRecord
{
    public $region_id;
    public $city_id;

    public static $grades = [
        '1_grade' => '1 сынып оқушысы',
        '2_grade' => '2 сынып оқушысы',
        '3_grade' => '3 сынып оқушысы',
        '4_grade' => '4 сынып оқушысы',
        '5_grade' => '5 сынып оқушысы',
        '6_grade' => '6 сынып оқушысы',
        '7_grade' => '7 сынып оқушысы',
        '8_grade' => '8 сынып оқушысы',
        '9_grade' => '9 сынып оқушысы',
        '10_grade' => '10 сынып оқушысы',
        '11_grade' => '11 сынып оқушысы',
        '1_course' => '1 курс студенті',
        '2_course' => '2 курс студенті',
        '3_course' => '3 курс студенті',
        '4_course' => '4 курс студенті',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_assignment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id','created_at'], 'integer'],
            [['name', 'surname', 'patronymic', 'leader_name', 'leader_phone', 'parent_name', 'parent_phone', 'grade'], 'string', 'max' => 255],
            [['iin'], 'string', 'max' => 20],

            [['city_id', 'region_id'], 'integer'],

            [['iin', 'name', 'surname', 'leader_phone', 'school_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'iin' => Yii::t('app', 'ИИН участника'),
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'grade' => Yii::t('app', 'Класс'),
            'leader_name' => Yii::t('app', 'Ф.И.О преподавателя'),
            'leader_phone' => Yii::t('app', 'Жетекші мұғалімнің телефон номері'),
            'parent_name' => Yii::t('app', 'Оқушы ата-ананың аты-жөні (тек бір адам)'),
            'parent_phone' => Yii::t('app', 'Оқушы ата-ананың телефон нөмері (тек бір адам)'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'created_at' => Yii::t('app', 'Время создание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    public function getGrade()
    {
        return BookAssignment::$grades[$this->grade];
    }

    public static function getGradeLabel($grade)
    {
        return BookAssignment::$grades[$grade];
    }

    public static function getNormalGrade($grade)
    {
        if ($grade == '1_grade') {
            return 1;
        }
        if ($grade == '2_grade') {
            return 2;
        }
        if ($grade == '3_grade') {
            return 3;
        }
        if ($grade == '4_grade') {
            return 4;
        }
        if ($grade == '5_grade') {
            return 5;
        }
        if ($grade == '6_grade') {
            return 6;
        }
        if ($grade == '7_grade') {
            return 7;
        }
        if ($grade == '8_grade') {
            return 8;
        }
        if ($grade == '9_grade') {
            return 9;
        }
        if ($grade == '10_grade') {
            return 10;
        }
        if ($grade == '11_grade') {
            return 11;
        }

        return 11;
    }
}
