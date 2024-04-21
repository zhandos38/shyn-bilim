<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "white_list".
 *
 * @property int $id
 * @property int|null $subject_id
 * @property int|null $olympiad_id
 * @property string|null $iin
 *
 * @property Subject $subject
 * @property Olympiad $olympiad
 */
class WhiteList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'white_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iin'], 'string', 'max' => 12],

            [['subject_id', 'olympiad_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iin' => 'ИИН',
            'subject_id' => 'Предмет',
            'olympiad_id' => 'Олимпиада',
        ];
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    public function getOlympiad()
    {
        return $this->hasOne(Olympiad::className(), ['id' => 'olympiad_id']);
    }
}
