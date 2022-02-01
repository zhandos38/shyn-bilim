<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string $name_kz
 * @property string $name_ru
 * @property string|null $img
 *
 * @property Test[] $tests
 * @property bool $type [tinyint(3)]
 * @property integer $order [tinyint(3)]
 */
class Subject extends \yii\db\ActiveRecord
{
    const TYPE_STUDENT = 0;
    const TYPE_TEACHER = 1;
    const TYPE_ARTICLE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_kz', 'name_ru'], 'required'],
            [['name_kz', 'name_ru'], 'string', 'max' => 100],
            [['img'], 'string', 'max' => 255],
            [['type', 'order'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name_kz' => Yii::t('app', 'Название на казахском'),
            'name_ru' => Yii::t('app', 'Название на русском'),
            'img' => Yii::t('app', 'Рисунок'),
            'type' => Yii::t('app', 'Тип'),
            'order' => Yii::t('app', 'Порядок')
        ];
    }

    /**
     * Gets query for [[Tests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['subject_id' => 'id']);
    }

    public static function getTypes()
    {
        return [
            self::TYPE_STUDENT => 'Для учеников',
            self::TYPE_TEACHER => 'Для учителей',
            self::TYPE_ARTICLE => 'Для материалов',
        ];
    }

    public function getTypeLabel()
    {
        return ArrayHelper::getValue(self::getTypes(), $this->type);
    }

    public function getName()
    {
        return Yii::$app->language === 'kz' ? $this->name_kz : $this->name_ru;
    }
}
