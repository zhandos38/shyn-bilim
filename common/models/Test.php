<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property int $olympiad_id
 * @property string|null $name
 * @property int|null $grade
 * @property int|null $created_at
 *
 * @property Question $questions
 * @property Subject $subject
 * @property int $time_limit [int(11)]
 * @property string $lang [varchar(2)]
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
            ['lang', 'string', 'max' => 2],
            [['olympiad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Olympiad::className(), 'targetAttribute' => ['olympiad_id' => 'id']],

            ['grade', 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
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
