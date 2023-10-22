<?php


namespace frontend\models;


use common\models\User;
use Yii;
use yii\base\Model;
use yii\db\Exception;
use yii\helpers\VarDumper;

/**
 *
 * @property mixed $user
 */
class VerificationForm extends Model
{
    public $phone;
    public $code;
    public $_user;

    public function rules()
    {
        return [
            ['code', 'required'],
            ['code', 'string', 'max' => 4],
            ['code', 'validateCode']
        ];
    }

    public function validateCode($attribute) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validateCode($this->code)) {
                $this->addError($attribute, 'Введён неправильный код');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'code' => 'СМС код'
        ];
    }

    public function verify()
    {
        if (!$this->validate()) {
            return null;
        }

        /** @var User $user */
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        if (!$user->save()) {
            Yii::$app->session->remove('phone');
            throw new Exception('User is not saved!');
        }

        return Yii::$app->user->login($user);
    }

    protected function getUser()
    {
        return $this->_user = User::findByPhone($this->phone);
    }
}