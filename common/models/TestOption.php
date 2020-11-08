<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "test_option".
 *
 * @property int $id
 * @property int|null $test_id
 * @property int|null $grade
 * @property string|null $lang
 *
 * @property Test $test
 * @property TestSubject[] $testSubjects
 */
class TestOption extends \yii\db\ActiveRecord
{
    const LANG_KZ = 'KZ';
    const LANG_RU = 'RU';
    const LANG_EN = 'EN';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'grade'], 'integer'],
            [['lang'], 'string', 'max' => 2],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test_id' => 'id']],
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
            'grade' => 'Класс',
            'lang' => 'Язык',
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

    /**
     * Gets query for [[TestSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTestSubjects()
    {
        return $this->hasMany(TestSubject::className(), ['test_option_id' => 'id']);
    }

    public static function getLanguages()
    {
        return [
            self::LANG_KZ => 'KZ',
            self::LANG_RU => 'RU',
            self::LANG_EN => 'EN'
        ];
    }

    public function getLanguage()
    {
        return ArrayHelper::getValue(self::getLanguages(), $this->lang);
    }
}
