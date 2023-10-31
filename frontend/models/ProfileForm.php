<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ProfileForm extends Model
{
    public $name;
    public $surname;
    public $patronymic;
    public $address;
    public $teacher_title;
    public $grade;
    public $city_id;
    public $region_id;
    public $school_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'address', 'teacher_title'], 'string'],
            [['school_id', 'grade'], 'integer'],
            [['name', 'surname', 'school_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'address' => 'Адрес',
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'grade' => 'Класс',
            'teacher_title' => 'Пән мүғалімі',
        ];
    }

    public function save()
    {
        $user = Yii::$app->user->identity;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->address = $this->address;
        $user->school_id = $this->school_id;
        $user->grade = $this->grade;
        $user->teacher_title = $this->teacher_title;
        return $user->save();
    }
}
