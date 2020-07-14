<?php
namespace frontend\models;


use common\models\Article;
use yii\base\Model;
use Exception;
use yii\helpers\VarDumper;

/**
 * Class OrderPayForm
 * @package api\modules\paybox\forms
 *
 * @property mixed $requestFields
 */
class PayboxForm extends Model
{
    const RESULT_PAYMENT_ACCEPTED = 1;
    const RESULT_NOT_FOUND = 2;
    const RESULT_PAID_BEFORE = 3;
    const RESULT_PROVIDER = 4;

    public $pg_order_id;
    public $pg_payment_id;
    public $pg_amount;
    public $pg_currency;
    public $pg_net_amount;
    public $pg_ps_amount;
    public $pg_ps_full_amount;
    public $pg_ps_currency;
    public $pg_payment_system;
    public $pg_description;
    public $pg_result;
    public $pg_payment_date;
    public $pg_can_reject;
    public $pg_user_phone;
    public $pg_need_phone_notification;
    public $pg_user_contact_email;
    public $pg_need_email_notification;
    public $pg_captured;
    public $pg_failure_code;
    public $pg_failure_description;
    public $pg_card_pan;
    public $pg_card_exp;
    public $pg_card_owner;
    public $pg_auth_code;
    public $pg_card_brand;
    public $pg_salt;
    public $pg_sig;

    public function rules()
    {
        return [
            [['pg_payment_id', 'pg_order_id', 'pg_amount', 'pg_result', 'pg_can_reject', 'pg_salt', 'pg_sig', ], 'required'],
            [['pg_payment_id', 'pg_order_id', 'pg_result',], 'integer'],
            ['pg_amount', 'number'],
            [
                [
                    'pg_order_id',
                    'pg_payment_id',
                    'pg_amount',
                    'pg_currency',
                    'pg_net_amount',
                    'pg_ps_amount',
                    'pg_ps_full_amount',
                    'pg_ps_currency',
                    'pg_payment_system',
                    'pg_description',
                    'pg_result',
                    'pg_payment_date',
                    'pg_can_reject',
                    'pg_user_phone',
                    'pg_need_phone_notification',
                    'pg_user_contact_email',
                    'pg_need_email_notification',
                    'pg_captured',
                    'pg_failure_code',
                    'pg_failure_description',
                    'pg_card_pan',
                    'pg_card_exp',
                    'pg_card_owner',
                    'pg_auth_code',
                    'pg_card_brand',
                    'pg_salt',
                    'pg_sig',
                ],
                'safe'
            ]

        ];
    }

    public function getRequestFields()
    {
        $array = [
            'pg_order_id' => $this->pg_order_id,
            'pg_payment_id' =>  $this->pg_payment_id,
            'pg_amount' => $this->pg_amount,
            'pg_currency' => $this->pg_currency,
            'pg_net_amount' => $this->pg_net_amount,
            'pg_ps_amount' => $this->pg_ps_amount,
            'pg_ps_full_amount' => $this->pg_ps_full_amount,
            'pg_ps_currency' => $this->pg_ps_currency,
            'pg_payment_system' => $this->pg_payment_system,
            'pg_description' => $this->pg_description,
            'pg_result' => $this->pg_result,
            'pg_payment_date' => $this->pg_payment_date,
            'pg_can_reject' => $this->pg_can_reject,
            'pg_user_phone' => $this->pg_user_phone,
            'pg_need_phone_notification' => $this->pg_need_phone_notification,
            'pg_user_contact_email' => $this->pg_user_contact_email,
            'pg_need_email_notification' => $this->pg_need_email_notification,
            'pg_captured' => $this->pg_captured,
            'pg_failure_code' => $this->pg_failure_code,
            'pg_failure_description' => $this->pg_failure_description,
            'pg_card_pan' => $this->pg_card_pan,
            'pg_card_exp' => $this->pg_card_exp,
            'pg_card_owner' => $this->pg_card_owner,
            'pg_auth_code' => $this->pg_auth_code,
            'pg_card_brand' => $this->pg_card_brand,
            'pg_salt' => $this->pg_salt,
            'pg_sig' => $this->pg_sig,
        ];

        return array_filter($array, 'strlen');
    }
}