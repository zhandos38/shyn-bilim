<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test_assignment".
 *
 * @property int $id
 * @property int|null $test_id
 * @property string $name
 * @property string $surname
 * @property string $iin
 * @property int|null $school_id
 * @property int $grade
 * @property int|null $created_at
 *
 * @property Test $test
 * @property int $point [int(11)]
 * @property int $finished_at [int(11)]
 */
class TestAssignment extends \yii\db\ActiveRecord
{
    public $subject_id;
    public $lang;
    public $region_id;
    public $city_id;

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
            [['test_id', 'school_id', 'grade', 'point', 'created_at'], 'integer'],
            [['name', 'surname', 'iin', 'school_id','grade', 'lang'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['iin'], 'string', 'max' => 12],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],

            ['iin', 'match', 'pattern' => '/^\d{12}$/', 'message' => Yii::t('app', 'Длина ИИН должен составлять 12 цифр')],
            ['iin', 'unique', 'targetClass' => '\common\models\TestAssignment', 'message' => Yii::t('app', 'Данный ИИН уже зарегистрирован')],

            ['lang', 'string', 'max' => 2],
            [['city_id', 'region_id'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'iin' => Yii::t('app', 'ИИН'),
            'school_id' => Yii::t('app', 'Школа'),
            'grade' => Yii::t('app', 'Класс'),
            'lang' => Yii::t('app', 'Язык'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
        ];
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
