<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "white_list".
 *
 * @property int $id
 * @property string $iin
 * @property string $date
 * @property int $amount
 * @property boolean $is_activated
 * @property int|null $created_at
 */
class KaspiWhiteList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kaspi_white_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iin'], 'string', 'max' => 12],
            ['date', 'string'],
            ['amount', 'integer'],
            ['is_activated', 'boolean'],
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
}
