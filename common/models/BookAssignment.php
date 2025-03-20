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
        return $this->grade . ' сынып оқушысы';
    }
}
