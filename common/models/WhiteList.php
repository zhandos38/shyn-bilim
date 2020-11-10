<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "white_list".
 *
 * @property int $id
 * @property string|null $iin
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iin' => 'Iin',
        ];
    }
}
