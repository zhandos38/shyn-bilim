<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $role;
    public $status;
    public $name;
    public $surname;
    public $patronymic;
    public $phone;
    public $iin ;
    public $address;
    public $city_id;
    public $region_id;
    public $school_id;
    public $post;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'email'],
            [['email', 'post'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['status', 'role'], 'integer'],

            [['name', 'surname', 'patronymic', 'iin', 'phone', 'address', 'post'], 'string'],
            ['school_id', 'integer'],
            [['name', 'surname', 'patronymic', 'iin'], 'required'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный телефон уже зарегистрирован'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'iin' => Yii::t('app', 'ИИН'),
            'phone' => Yii::t('app', 'Номер телефона'),
            'address' => 'Адрес',
            'school_id' => Yii::t('app', 'Школа/Колледж'),
            'email' => 'Email',
            'city_id' => Yii::t('app', 'Город'),
            'region_id' => Yii::t('app', 'Регион'),
            'post' => Yii::t('app', 'Почтовый индекс'),
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

        $user = new User();
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronymic = $this->patronymic;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->post = $this->post;
        $user->school_id = $this->school_id;
        $user->iin = $this->iin;
        $user->email = $this->email;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save();

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
