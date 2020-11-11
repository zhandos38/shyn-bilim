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
 * @property string $iin
 * @property int|null $school_id
 * @property int $grade
 * @property int $status
 * @property int|null $created_at
 *
 * @property TestOption $test_option
 * @property TestAssignment $school
 * @property int $point [int(11)]
 * @property int $finished_at [int(11)]
 * @property string $patronymic [varchar(255)]
 */
class TestAssignment extends \yii\db\ActiveRecord
{
    public $subject_id;
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
            [['test_option_id', 'school_id', 'grade', 'point', 'created_at'], 'integer'],
            [['name', 'surname', 'iin', 'school_id', 'lang'], 'required'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 255],
            [['iin'], 'string', 'max' => 14],
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
            'school_id' => Yii::t('app', 'Школа'),
            'grade' => Yii::t('app', 'Класс'),
            'lang' => Yii::t('app', 'Язык'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'status' => Yii::t('app', 'Статус'),
            'point' => Yii::t('app', 'Баллы'),
            'created_at' => Yii::t('app', 'Время создание'),
        ];
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
}
