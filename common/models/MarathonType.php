<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marathon_type".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Marathon[] $marathons
 */
class MarathonType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marathon_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Marathons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarathons()
    {
        return $this->hasMany(Marathon::className(), ['marathon_type_id' => 'id']);
    }
}
