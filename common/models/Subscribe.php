<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "subscribe".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $created_at
 *
 * @property User $user
 */
class Subscribe extends \yii\db\ActiveRecord
{
    const STATUS_OFF = 0;
    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_OFF => 'Не оплачено',
            self::STATUS_ACTIVE => 'Оплачено',
        ];
    }

    public function getStatus()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }
}
