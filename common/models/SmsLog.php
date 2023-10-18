<?php

namespace common\models;

use frontend\components\SMSCenter;
use Yii;
use yii\db\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\httpclient\Client;

/**
 * This is the model class for table "sms_log".
 *
 * @property int $id
 * @property string|null $text
 * @property int|null $message_type
 * @property int|null $status
 * @property int|null $created_at
 * @property int $user_id [int(11)]
 * @property mixed $statusLabel
 * @property string $text_error [varchar(255)]
 */
class SmsLog extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_ERROR = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message_type', 'status', 'created_at'], 'integer'],
            [['text'], 'string', 'max' => 255],
            ['text_error', 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Текс',
            'text_error' => 'Текс ошибки',
            'message_type' => 'Тип',
            'status' => 'Статус',
            'created_at' => 'Время добавления',
        ];
    }

    public static function getStatuses()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_SUCCESS => 'ОК',
            self::STATUS_ERROR => 'Ошибка!',
        ];
    }

    public function getStatusLabel()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }

    public static function sendSms($phone, $message, $userId)
    {
        $smsc = Yii::$app->sms;
        $response = $smsc->send(7 . $phone, $message);

        $smsLog = new self();
        $smsLog->user_id = !empty($userId) ? $userId : null;
        $smsLog->text = $message;
//        $smsLog->text_error = $response;
        $smsLog->status = $response ? self::STATUS_SUCCESS : self::STATUS_ERROR;
        $smsLog->created_at = time();
        if (!$smsLog->save()) {
            throw new Exception(json_encode($smsLog->errors));
        }

        return true;
    }
}