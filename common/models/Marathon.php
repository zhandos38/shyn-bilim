<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marathon".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $iin
 * @property int|null $school_id
 * @property int|null $grade
 * @property string|null $phone
 * @property string|null $phone_parent
 * @property string|null $phone_teacher
 */
class Marathon extends \yii\db\ActiveRecord
{
    public $region_id;
    public $city_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marathon';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'grade'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['iin', 'phone', 'phone_parent', 'phone_teacher'], 'string', 'max' => 20],

            [['name', 'surname', 'patronymic', 'school_id', 'grade', 'iin', 'phone', 'phone_parent', 'phone_teacher'], 'required'],
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
            'iin' => Yii::t('app', 'ИИН'),
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'grade' => Yii::t('app', 'Класс'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'phone_parent' => Yii::t('app', 'Номер телефона родителей'),
            'phone_teacher' => Yii::t('app', 'Номер телефона преподавателей'),
        ];
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }
}
