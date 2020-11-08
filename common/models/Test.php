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
 * @property string $name
 * @property int|null $created_at
 *
 * @property Question $questions
 * @property Subject $subject
 * @property int $time_limit [int(11)]
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
            [['olympiad_id', 'time_limit', 'created_at'], 'integer'],

            ['name', 'string', 'max' => 255],
            [['olympiad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Olympiad::className(), 'targetAttribute' => ['olympiad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Наименование'),
            'olympiad_id' => Yii::t('app', 'Олимпиада'),
            'grade' => Yii::t('app', 'Класс'),
            'lang' => Yii::t('app', 'Язык'),
            'time_limit' => Yii::t('app', 'Ограничение по времени'),
            'created_at' => Yii::t('app', 'Время добавления')
        ];
    }

    public function getOlympiad()
    {
        return $this->hasOne(Olympiad::className(), ['id' => 'olympiad_id']);
    }
}
