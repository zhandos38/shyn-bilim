<?php
namespace frontend\models;

use common\models\SmsLog;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\db\Exception;
use yii\helpers\Json;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $password;
    public $role;
    public $name;
    public $surname;
    public $patronymic;
    public $phone;
    public $address;
    public $city_id;
    public $region_id;
    public $school_id;
    public $grade;
    public $teacher_title;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'string', 'min' => 6],
            [['name', 'surname', 'patronymic', 'phone', 'address', 'role', 'teacher_title'], 'string'],
            [['school_id', 'grade'], 'integer'],
            [['name', 'surname', 'password'], 'required'],

//            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Бұл телефон тіркеліп қойған'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'address' => 'Адрес',
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'role' => 'Оқушы/Оқытушы',
            'grade' => 'Класс',
            'teacher_title' => 'Пән мүғалімі',
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $userFound = User::findOne(['phone' => $this->phone]);
        if ($userFound) {
            SmsLog::sendSms($this->phone, $userFound->verification_code . ' - Bilimshini', $userFound->id);
            Yii::$app->session->set('phone', $this->phone);
            return true;
        }

        try {
            $transaction = Yii::$app->db->beginTransaction();
            $user = new User();
            $user->name = $this->name;
            $user->surname = $this->surname;
            $user->patronymic = $this->patronymic;
            $user->phone = $this->phone;
            $user->address = $this->address;
            $user->school_id = $this->school_id;
            $user->role = $this->role;
            $user->status = User::STATUS_INACTIVE;
            $user->verification_code = (string)($code = random_int(1000, 9999));
            $user->shyn_bonus = 0;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if (!$user->save()) {
                throw new Exception(Json::encode($user->errors));
            }

            SmsLog::sendSms($this->phone, $code . ' - Bilimshini', $user->id);
            Yii::$app->session->set('phone', $this->phone);

            $transaction->commit();
            return true;
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw new Exception($exception->getMessage());
        }
    }
}
